@extends('layouts.app')

@section('content')

<div class="container py-4 index-reviews">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Reviews List
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach ($reviews as $review)
                        <a href="{{ route('admin.reviews.show', $review->id) }}" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $review->name }} {{ $review->surname }}</h5>
                                <small class="text-muted">{{ $review->created_at->format('d/m/Y') }}</small>
                            </div>
                            <p class="mb-1">{{ \Illuminate\Support\Str::limit($review->review_text, 100) }}</p>
                            <small class="text-muted">{{ $review->email }}</small>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $reviews->links() }}
    </div>
</div>

@endsection
