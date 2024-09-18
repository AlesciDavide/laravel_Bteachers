@extends('layouts.app')

@section('content')

<div class="container py-4 index-messages">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="alert alert-info" role="alert">
                <h4 class="alert-heading">Messages List </h4>
                <p>"You can view all received messages here. Click on a message to see the full details."</p>
            </div>
        </div>
    </div>

    <!-- Messages List -->
    <div class="row">
        <div class="col-md-12">
            <div class="list-group">
                @foreach ($messages as $message)
                <a href="{{ route('admin.messages.show', $message->id) }}" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">
                            <i class="bi bi-envelope-fill"></i> <!--Icons Email Bootstrap -->
                            {{ $message->name ?? '' }} {{ $message->surname ?? '' }} {{ $message->name || $message->surname ? '' : 'Anonymous' }}
                        </h5>
                        <small class="text-muted">{{ $message->created_at->format('d/m/Y H:i') }}</small>
                    </div>
                    <p class="mb-1">{{ \Illuminate\Support\Str::limit($message->message_text, 50) }}</p>
                    <small class="text-muted">
                        <i class="bi bi-telephone"></i> <!--Icona Telephone Bootstrap -->
                        {{ $message->telephone_number }} | {{ $message->email }}
                    </small>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $messages->links() }}
    </div>

</div>

@endsection
