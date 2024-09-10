@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Dettagli del Messaggio
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $message->name }} {{ $message->surname }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $message->email }}</h6>

                    <div class="mb-3">
                        <p class="mb-1"><strong>Numero di Telefono:</strong></p>
                        <p>{{ $message->telephone_number }}</p>
                    </div>

                    <div>
                        <p class="mb-1"><strong>Testo del Messaggio:</strong></p>
                        <p>{{ $message->message_text }}</p>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <!-- Aggiungi eventuali azioni o note qui -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

