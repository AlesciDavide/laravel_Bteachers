@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <h2 class="mb-4">Invia un Nuovo Messaggio</h2>

            <form method="POST" action='{{ route('admin.messages.store') }}' class="form-selector">
                @csrf
                <input type="hidden" name="profile_id" value="{{ $profile->id }}">

                <!-- Nome -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Cognome -->
                <div class="mb-3">
                    <label for="surname" class="form-label">Cognome</label>
                    <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname') }}">
                    @error('surname')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Numero di telefono -->
                <div class="mb-3">
                    <label for="telephone_number" class="form-label">Numero di Telefono</label>
                    <input type="text" class="form-control" id="telephone_number" name="telephone_number" value="{{ old('telephone_number') }}">
                    @error('telephone_number')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    <div class="form-text">Non condivideremo la tua email con nessun altro.</div>
                    @error('email')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Testo del messaggio -->
                <div class="mb-3">
                    <label for="message_text" class="form-label">Testo del Messaggio</label>
                    <textarea class="form-control" id="message_text" name="message_text" style="height: 150px">{{ old('message_text') }}</textarea>
                    @error('message_text')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Pulsante di invio -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Invia Messaggio</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
