@extends('components/app-layout')

@section('content')
    <div class="container mt-5">
        <div class="card shadow rounded-4 p-4 position-relative">

            {{-- Top-right Edit Button --}}
            {{-- @if (optional($user)->role !== 'ADMIN') --}}
            <div class="position-absolute top-0 end-0 m-3">
                <a href="{{ route('user.profile.edit') }}" class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-edit"></i> Edit
                </a>
            </div>
            {{-- @endif --}}

            {{-- Profile Heading --}}
            <h4 class="mb-4 text-primary d-flex align-items-center gap-2">
                <i class="fas fa-user-circle text-warning"></i>
                <span class="fw-semibold">Your Profile</span>
            </h4>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            {{-- User Details --}}
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Full Name:</div>
                <div class="col-md-8">{{ optional($user)->first_name ?? '' }} {{ optional($user)->middle_name ?? ''}} {{ optional($user)->last_name ?? '' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Email:</div>
                <div class="col-md-8">{{ optional($user)->email }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Phone Number:</div>
                <div class="col-md-8">{{ optional($user)->phone_number }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Date of Birth:</div>
                <div class="col-md-8">{{ optional($user)->date_of_birth }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Father's Name:</div>
                <div class="col-md-8">{{ optional($user)->father_name }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Mother's Name:</div>
                <div class="col-md-8">{{ optional($user)->mothers_name }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Aadhar Number:</div>
                <div class="col-md-8">{{ optional($user)->aadhar_number }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Aadhar Number:</div>
                <div class="col-md-8">{{ optional($user)->aadhar_number }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Passport Number:</div>
                <div class="col-md-8">{{ optional($user)->passport_number }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Voter Id:</div>
                <div class="col-md-8">{{ optional($user)->voter_id }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Address:</div>
                <div class="col-md-8">
                    @if (optional($user)->address_line1)
                        {{ optional($user)->address_line1 }}<br>
                    @endif
                    @if (optional($user)->address_line2)
                        {{ optional($user)->address_line2 }}<br>
                    @endif
                    @if (optional($user)->city || optional($user)->district || optional($user)->state || optional($user)->pincode)
                        {{ optional($user)->city ? optional($user)->city . ',' : '' }}
                        {{ optional($user)->district ? optional($user)->district . ',' : '' }}
                        {{ optional($user)->state ? optional($user)->state : '' }}
                        {{ optional($user)->pincode ? '- ' . optional($user)->pincode : '' }}<br>
                    @endif
                    @if (optional($user)->landmark)
                        <strong>Landmark:</strong> {{ optional($user)->landmark }}
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
