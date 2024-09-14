@extends('layouts.app')
@section('content')

<div class="container py-4 index-mail">

    <!-- Lista dei messaggi -->
    <div class="row">
        <div class="col-md-12">
            <div class="list-group">
                @foreach ($messages as $message)
                <a href="{{ route('admin.messages.show', $message->id) }}" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">
                            <i class="bi bi-envelope-fill"></i> <!-- Icona di email -->
                            {{ $message->name }} {{ $message->surname }}
                        </h5>
                        <small class="text-muted">{{ $message->created_at->format('d/m/Y H:i') }}</small>
                    </div>
                    <p class="mb-1">{{ \Illuminate\Support\Str::limit($message->message_text, 50) }}</p>
                    <small class="text-muted">
                        <i class="bi bi-telephone"></i> <!-- Icona di telefono -->
                        {{ $message->telephone_number }} | {{ $message->email }}
                    </small>
                </a>

                @endforeach
            </div>
        </div>
    </div>

</div>

<!-- Paginazione -->
<div class="d-flex justify-content-center">
    {{ $messages->links() }}
</div>

@endsection
