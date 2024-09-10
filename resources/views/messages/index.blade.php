@extends('layouts.app')
@section('content')

<div class="container py-4">

    <!-- Lista dei messaggi -->
    <div class="row">
        @foreach ($messages as $message)
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ $message->name }} {{ $message->surname }}</h5>
                    <h6 class="card-subtitle text-muted">{{ $message->email }}</h6>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {{ $message->message_text }}
                    </p>
                    <p class="card-text">
                        <small class="text-muted">Telefono: {{ $message->telephone_number }}</small>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

