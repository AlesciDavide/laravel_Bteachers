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

        <!-- Profile Edit Form -->
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning text-white text-center">
                    <h3>Edit Profile</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.profiles.update' , $profile) }}" method="POST" id="edit_form" enctype="multipart/form-data">
                        @method("PUT")
                        @csrf

                        <!-- Office Address -->
                        <div class="form-group mb-3">
                            <label for="address" class="form-label">Office Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter office address" value="{{ old('address', $profile->address) }}">
                        </div>
                        <div class="row mb-3 error_validation_address">

                        </div>
                        <!-- Office Telephone Number -->
                        <div class="form-group mb-3">
                            <label for="telephone_number" class="form-label">Office Telephone Number</label>
                            <input type="text" class="form-control" id="telephone_number" name="telephone_number" placeholder="Enter office telephone number" value="{{ old('telephone_number', $profile->telephone_number) }}">
                        </div>
                        <div class="row mb-3 error_validation_telephone_number">

                        </div>
                        <!-- Service Description -->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Describe your services" id="service" name="service" style="height: 150px">{{ old('service', $profile->service) }}</textarea>
                            <label for="service">Describe Your Services</label>
                        </div>
                        <div class="row mb-3 error_validation_service">

                        </div>
                        <!-- Visibility -->
                        <div class="form-group mb-3">
                            <label for="visible" class="form-label">Profile Visibility</label>
                            <select class="form-select" id="visible" name="visible">
                                <option selected value="1" {{ old('visible', $profile->visible) == 1 ? 'selected' : '' }}>Visible</option>
                                <option value="0" {{ old('visible', $profile->visible) == 0 ? 'selected' : '' }}>Invisible</option>
                            </select>
                        </div>
                        <div class="row mb-3 error_validation_visible">

                        </div>
                        <!-- Specialization -->
                        <div class="my-form">
                            <label for="specialization_id">Choose your specializations</label>
                            <div>
                                <div class="d-flex flex-wrap flex-column w-100">
                                @foreach ($specializations as $specialization)
                                <div class="w-50 d-flex">
                                    @if ($errors->any())
                                    <input name="specializations[]" type="checkbox"  id="technology-check-{{$specialization->id}}" autocomplete="off" value="{{$specialization->id}}"
                                    {{ in_array($specialization->id, old('specialization', [])) ? "checked" : ""}}
                                    >
                                    @else
                                    <input name="specializations[]" type="checkbox"  id="technology-check-{{$specialization->id}}" autocomplete="off" value="{{$specialization->id}}"
                                    {{ $profile->specializations->contains($specialization) ? "checked" : ""}}
                                    >
                                    @endif

                                    <label class="m-1" for="technology-check-{{$specialization->id}}">
                                        <div >
                                            <div class="inner">{{$specialization->field}} - {{$specialization->name}}</div>
                                        </div>
                                    </label>

                                </div>

                                @endforeach
                                </div>

                            </div>

                        </div>
                        <div class="row mb-3 error_validation_specializations">

                        </div>
                        <!-- Profile Photo Upload -->
                        <div class="form-group mb-4">
                            <label for="photo" class="form-label">Profile Picture</label>
                            <input class="form-control" type="file" id="photo" name="photo" accept="image/*">
                            <img class="img-fluid mt-3 w-50" src="{{ asset('storage/' . $profile->photo) }}" alt="Current Profile Picture">
                        </div>

                        <!-- CV Upload -->
                        <div class="form-group mb-4">
                            <label for="cv" class="form-label">Upload Your CV (PDF)</label>
                            <input class="form-control" type="file" id="cv" name="cv" accept=".pdf">
                            <embed src="{{ asset('storage/' . $profile->cv) }}" width="500" height="375" type="application/pdf" class="mt-3">
                        </div>

                        <!-- Submit and Reset Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary px-4">Update Profile</button>
                            <button type="reset" class="btn btn-warning px-4">Reset Fields</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_script')
@vite('resources/js/validation/editProfileValidation.js')
@endsection
