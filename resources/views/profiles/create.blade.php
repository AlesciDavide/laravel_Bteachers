@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <!-- Error Alert -->
        @if ($errors->any())
        <div class="alert alert-danger w-75">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Profile Creation Form -->
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Create Your Profile</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.profiles.store') }}" method="POST" id="creation_form" enctype="multipart/form-data">
                        @csrf

                        <!-- Name (Already filled with user's name) -->
                        <div class="mb-4">
                            <h1 class="text-center text-info">{{ $user->name }}</h1>
                        </div>

                        <!-- Office Address -->
                        <div class="form-group mb-3">
                            <label for="address" class="form-label">Office Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter office address" value="{{ old('address') }}">
                        </div>

                        <!-- Office Telephone Number -->
                        <div class="form-group mb-3">
                            <label for="telephone_number" class="form-label">Office Telephone Number</label>
                            <input type="text" class="form-control" id="telephone_number" name="telephone_number" placeholder="Enter office telephone number" value="{{ old('telephone_number') }}">
                        </div>

                        <!-- Service Description -->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Describe your services" id="service" name="service" style="height: 150px">{{ old('service') }}</textarea>
                            <label for="service">Describe Your Services</label>
                        </div>

                        <!-- Visibility -->
                        <div class="form-group mb-3">
                            <label for="visible" class="form-label">Profile Visibility</label>
                            <select class="form-select" id="visible" name="visible">
                                <option selected value="1">Visible</option>
                                <option value="0">Invisible</option>
                            </select>
                        </div>

                        <!-- Specialization -->
                        <div class="form-group mb-3">
                            <label for="specialization" class="form-label">Specialization</label>
                            <div class="d-flex flex-wrap">
                                @foreach ($specializations as $specialization)
                                    <div class="form-check me-3 mb-2">
                                        <input class="form-check-input" type="checkbox" id="technology-check-{{$specialization->id}}" name="specialization[]" value="{{$specialization->id}}"
                                        {{ in_array($specialization->id, old('specialization', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="technology-check-{{$specialization->id}}">
                                            {{ $specialization->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Profile Photo Upload -->
                        <div class="form-group mb-4">
                            <label for="photo" class="form-label">Profile Picture</label>
                            <input class="form-control" type="file" id="photo" name="photo" accept="image/*">
                        </div>

                        <!-- CV Upload -->
                        <div class="form-group mb-4">
                            <label for="cv" class="form-label">Upload Your CV (PDF)</label>
                            <input class="form-control" type="file" id="cv" name="cv" accept=".pdf">
                        </div>

                        <!-- Submit and Reset Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary px-4">Create Profile</button>
                            <button type="reset" class="btn btn-warning px-4">Reset Fields</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
