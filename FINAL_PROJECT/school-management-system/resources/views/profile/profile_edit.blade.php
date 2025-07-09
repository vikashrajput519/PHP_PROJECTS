@extends('components/app-layout')

@section('content')
    <div class="container mt-5">
        <div class="card shadow rounded-4 p-4">
            <h4 class="mb-4 text-primary d-flex align-items-center gap-2">
                <i class="fas fa-user-edit text-warning"></i>
                <span>Edit Profile</span>
            </h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('user.profile.update') }}">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-4"><label class="form-label">First Name</label></div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="first_name"
                            value="{{ old('first_name', $profileData->first_name) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><label class="form-label">Middle Name</label></div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="middle_name"
                            value="{{ old('middle_name', $profileData->middle_name) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><label class="form-label">Last Name</label></div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="last_name"
                            value="{{ old('last_name', $profileData->last_name) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><label class="form-label">Phone Number</label></div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="phone_number"
                            value="{{ old('phone_number', $profileData->phone_number) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><label class="form-label">Date of Birth</label></div>
                    <div class="col-md-8">
                        <input type="date" class="form-control" name="date_of_birth"
                            value="{{ old('date_of_birth', $profileData->date_of_birth) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><label class="form-label">Father's Name</label></div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="father_name"
                            value="{{ old('father_name', $profileData->father_name) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><label class="form-label">Mother's Name</label></div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="mothers_name"
                            value="{{ old('mothers_name', $profileData->mothers_name) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><label class="form-label">Aadhar Number</label></div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="aadhar_number"
                            value="{{ old('aadhar_number', $profileData->aadhar_number) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><label class="form-label">Passport Number</label></div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="passport_number"
                            value="{{ old('passport_number', $profileData->passport_number) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><label class="form-label">Voter Id</label></div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="voter_id"
                            value="{{ old('voter_id', $profileData->voter_id) }}">
                    </div>
                </div>

                <hr>

                <h5 class="mt-4 text-secondary">Address</h5>

                <div class="row mb-3">
                    <div class="col-md-4"><label class="form-label">Address Line 1</label></div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="address_line1"
                            value="{{ old('address_line1', $profileData->address_line1) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><label class="form-label">Address Line 2</label></div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="address_line2"
                            value="{{ old('address_line2', $profileData->address_line2) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><label class="form-label">City</label></div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="city" value="{{ old('city', $profileData->city) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><label class="form-label">District</label></div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="district"
                            value="{{ old('district', $profileData->district) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><label class="form-label">State</label></div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="state"
                            value="{{ old('state', $profileData->state) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><label class="form-label">Pincode</label></div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" name="pincode"
                            value="{{ old('pincode', $profileData->pincode) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><label class="form-label">Landmark</label></div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="landmark"
                            value="{{ old('landmark', $profileData->landmark) }}">
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-1"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger" style="margin-top: 10px;">
                <strong>Whoops! Something went wrong:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
@endsection
