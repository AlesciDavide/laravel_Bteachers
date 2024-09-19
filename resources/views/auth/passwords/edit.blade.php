@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Update Profile</div>

                <div class="card-body">
                    <form id="edit_user_form" method="POST" action="{{ route('admin.user.update') }}">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" required>
                        </div>
                        <div class="row mb-3 error_validation_name">

                        </div>
                        <!-- Surname -->
                        <div class="form-group mb-3">
                            <label for="surname" class="form-label">Surname</label>
                            <input id="surname" type="text" class="form-control" name="surname" value="{{ auth()->user()->surname }}" required>
                        </div>
                        <div class="row mb-3 error_validation_surname">

                        </div>
                        <!-- Email -->
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" required>
                        </div>
                        <div class="row mb-3 error_validation_email">

                        </div>
                        <!-- Address -->
                        <div class="form-group mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input id="address" type="text" class="form-control" name="address" value="{{ auth()->user()->address }}">
                        </div>

                        <!-- New Password -->
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">New Password (optional)</label>
                            <input id="password" type="password" class="form-control" name="password">
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                        </div>
                        <div class="row mb-3 error_validation_password">

                        </div>
                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Update Profile</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_script')
@vite('resources/js/validation/editUserValidation.js')
@endsection
