@extends('layouts.app')

@section('content')

<div class="container py-4 show-review">
    <div class="card">
        <div class="card-header bg-primary text-white">
            Review Details
        </div>
        <div class="card-body">
            <h5 class="card-title">
                {{ $review->name ?? '' }} {{ $review->surname ?? '' }} {{ $review->name || $review->surname ? '' : 'Anonymous' }}
            </h5>
            <small class="text-muted">{{ $review->created_at->format('d/m/Y') }}</small>
            <p class="card-text mt-3">{{ $review->review_text }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $review->email }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to reviews
            </a>
        </div>
    </div>
</div>

@endsection
