<?php

namespace App\Http\Controllers;

use App\Enums\UserRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function getProfilePage()
    {
        $user = Auth::user();
        $role = strtoupper($user->role);

        $profileData = match($role) {
            UserRoles::STAFF->value,
            UserRoles::ADMIN->value => $user->staff ?? $user,
            UserRoles::STUDENT->value => $user->student ?? $user,
            default =>$user,
        };

        return view('profile/profile', ['user' => $profileData]);
    }

    public function edit()
    {
        $user = Auth::user();
        $role = strtoupper($user->role);

        $profileData = match($role) {
            UserRoles::STAFF->value => $user->staff ?? $user,
            UserRoles::ADMIN->value => $user->staff ?? $user,
            UserRoles::STUDENT->value => $user->student ?? $user,
            default=>$user,
        };

        return view('profile/profile_edit', compact('profileData'));
    }

    public function update(Request $request)
    {
        try {
            /** @var \App\Models\User $user */
            $user = Auth::user();
            $role = strtoupper($user->role);

            // Step 1: Validate input
            $validated = $request->validate([
                'first_name'      => 'required|string|max:255',
                'middle_name'     => 'nullable|string|max:255',
                'last_name'       => 'required|string|max:255',
                'phone_number'    => 'nullable|string|max:10',
                'date_of_birth'   => 'nullable|date',
                'father_name'     => 'nullable|string|max:255',
                'mothers_name'    => 'nullable|string|max:255',
                'aadhar_number'   => 'nullable|string|max:12',
                'passport_number' => 'nullable|string|max:20',
                'voter_id'        => 'nullable|string|max:20',
                'address_line1'   => 'nullable|string',
                'address_line2'   => 'nullable|string',
                'city'            => 'nullable|string|max:100',
                'district'        => 'nullable|string|max:100',
                'state'           => 'nullable|string|max:100',
                'pincode'         => 'nullable|string|max:10',
                'landmark'        => 'nullable|string|max:255',
            ]);

            $validated['email'] = $user->email;

            $model = null;

            // Step 2: Determine and create or fetch related model
            switch ($role) {
                case UserRoles::STAFF->value:
                    $model = $user->staff ?? $user->staff()->create(array_merge($validated, [
                        'designation' => 'TEACHER', // default designation
                    ]));
                    break;

                case UserRoles::STUDENT->value:
                    $model = $user->student ?? $user->student()->create($validated);
                    break;
                case UserRoles::ADMIN->value:
                    $model = $user->staff ?? $user->staff()->create(array_merge($validated, [
                        'designation' => 'ADMIN', // default designation
                    ]));
                    break;
                default:
                    return redirect()->back()->with('error', 'Profile update failed. Unknown user role.');
            }

            // Step 3: Update if not newly created
            if ($model && !$model->wasRecentlyCreated) {
                $model->update($validated);
            }

            return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Validation failed. Please check the input fields.');
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Database error during profile update: ' . $e->getMessage());
            return redirect()->back()->with('error', 'A database error occurred. Please try again later.');
        } catch (\Exception $e) {
            Log::error('Unexpected error during profile update: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred. Please contact support.');
        }
    }
}
