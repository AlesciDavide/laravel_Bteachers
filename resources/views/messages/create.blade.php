@extends('layouts.app')

@section('content')


<form method="POST" action='{{route('admin.messages.store')}}' class="form-selector">
    @method('POST')
    @csrf
    <input type="hidden" name="profile_id" value="{{ $profile->id }}">
    <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="name">Nome</span>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="name" name="name" value="{{ old('name') }}">
    </div>
    @error('name')
    <div class="alert alert-danger my-2">
        {{ $message }}
    </div>
@enderror

    <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="surname">surname</span>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="surname" value="{{ old('surname') }}">
    </div>
    @error('surname')
    <div class="alert alert-danger my-2">
        {{ $message }}
    </div>
@enderror

    <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="telephone_number">telephone number</span>
        <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="telephone_number" value="{{ old('telephone_number') }}">
    </div>
    @error('telephone_number')
    <div class="alert alert-danger my-2">
        {{ $message }}
    </div>
@enderror

    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="{{ old('email') }}">
        <div id="email" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    @error('email')
    <div class="alert alert-danger my-2">
        {{ $message }}
    </div>
@enderror

    <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a message here" id="message_text" style="height: 100px" name="message_text"></textarea>
        <label for="message_text">{{ old('telephone_number') }}</label>
    </div>
    @error('message_text')
    <div class="alert alert-danger my-2">
        {{ $message }}
    </div>
@enderror

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
