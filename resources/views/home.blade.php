@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h3 class="mb-0">{{ __('Dashboard') }}</h3>
                </div>
                {{-- @if (session("message"))
                    <div class="alert alert-danger">
                        {{ session("message") }}
                    </div>
                @endif --}}
                <div class="card-body p-5">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <h4 class="mb-4 text-center">{{ __('You are logged in!') }}</h4>

                    <div class="row justify-content-center mb-4">
                        <div class="col-12 text-center">
                            <p class="display-6">Welcome, <strong>{{ Auth::user()->name }} {{ Auth::user()->surname }}</strong>!</p>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        @php
                        // Recupera il profilo dell'utente loggato
                        $profile = Auth::user()->profile;
                        @endphp

                        <div class="col-md-6">
                            @if($profile)
                                <!-- If user has a profile, show "My Profile" button -->
                                <a href="{{ route('admin.profiles.show', ['profile' => $profile->id]) }}" class="btn btn-outline-primary btn-lg w-100 mb-3">My Profile</a>
                                <div >
                                    <a href="{{route('admin.profile.statistics') }}" class="btn btn-primary btn-lg w-100 mb-3">Go to Statistics Page</a>
                                </div>
                            @else
                                <!-- If no profile, show "Create Profile" button -->
                                <a href="{{ route('admin.profiles.create') }}" class="btn btn-outline-primary btn-lg w-100 mb-3">Create Profile</a>

                            @endif
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
