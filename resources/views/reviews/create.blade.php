@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h1>CREATE Reviews </h1>
            <form action="{{route('admin.reviews.store')}}" method="POST" id="add-form" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <input type="text" name="profile_id" id="profile_id" value="{{ $profile->id }}">
                <div class="mb-3">
                    <label for="name">Reviewrs Name</label>
                    <input class="form-control form-control-sm" type="text" placeholder="ReviewrsName" aria-label="ReviewrsName" name="name" id="name" >
                    @error('name')
                    <div class="alert alert-danger mt-2">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="surname">Reviewrs Surname</label>
                    <input class="form-control form-control-sm" type="text" placeholder="ReviewrSurname" aria-label="ReviewrsSurname" name="surname" id="surname" >
                    @error('surname')
                    <div class="alert alert-danger mt-2">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email">Reviewrs Email</label>
                    <input class="form-control form-control-sm" type="text" placeholder="ReviewrsEmail" aria-label="ReviewrsName" name="email" id="email" >
                    @error('email')
                    <div class="alert alert-danger mt-2">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name">Reviewrs Name</label>
                    <textarea class="form-control form-control-sm"  placeholder="review_text" aria-label="ReviewrsName" name="review_text" id="review_text" ></textarea>
                    @error('review_text')
                    <div class="alert alert-danger mt-2">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 d-flex justify-content-between p-2">
                    <input type="submit" value="Create new Review" class="btn btn-primary" >
                    <input type="reset" value="Reset" class="btn btn-danger">
                </div>

@endsection
