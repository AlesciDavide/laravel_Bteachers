@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Crea Nuova Recensione
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.reviews.store') }}" method="POST" id="add-form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="profile_id" value="{{ $profile->id }}">

                        <div class="mb-3">
                            <label for="name" class="form-label">Nome del Recensore</label>
                            <input class="form-control form-control-sm" type="text" placeholder="Nome del Recensore" aria-label="Nome del Recensore" name="name" id="name" value="{{ old('name') }}">
                            @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="surname" class="form-label">Cognome del Recensore</label>
                            <input class="form-control form-control-sm" type="text" placeholder="Cognome del Recensore" aria-label="Cognome del Recensore" name="surname" id="surname" value="{{ old('surname') }}">
                            @error('surname')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email del Recensore</label>
                            <input class="form-control form-control-sm" type="email" placeholder="Email del Recensore" aria-label="Email del Recensore" name="email" id="email" value="{{ old('email') }}">
                            @error('email')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="review_text" class="form-label">Testo della Recensione</label>
                            <textarea class="form-control form-control-sm" placeholder="Inserisci la recensione" aria-label="Testo della Recensione" name="review_text" id="review_text" rows="4">{{ old('review_text') }}</textarea>
                            @error('review_text')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-primary">Crea Nuova Recensione</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
