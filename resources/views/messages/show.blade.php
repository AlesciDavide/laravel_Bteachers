@extends('layouts.app')
@section('content')

<div class="container py-4 show-message">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        <i class="bi bi-envelope-fill me-2"></i>
                        {{ $message->name }} {{ $message->surname }}
                    </h5>
                    <h6 class="card-subtitle text-muted">{{ $message->email }}</h6>
                </div>
                <div class="card-body">
                    <!-- Message Text -->
                    <p class="card-text">
                        {{ $message->message_text }}
                    </p>
                    <p class="card-text">
                        <i class="bi bi-telephone me-2"></i>
                        <small class="text-muted">Telephone : {{ $message->telephone_number }}</small>
                    </p>elefono
                    <p class="card-text">
                        <i class="bi bi-calendar me-2"></i>
                        <small class="text-muted">Recived on: {{ $message->created_at->format('d/m/Y H:i') }}</small>
                    </p>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Back to messages
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
