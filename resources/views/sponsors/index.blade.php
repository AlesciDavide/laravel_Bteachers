@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            @foreach ($sponsors as $sponsor)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-lg border-0 rounded-3">
                        <div class="card-body text-center">
                            <div class="icon my-3">
                                <i class="bi bi-gem display-3 text-primary"></i>
                            </div>
                            <h3 class="card-title mb-3 fw-bold">{{ $sponsor->name }}</h3>
                            <h5 class="card-subtitle mb-3 text-muted">Level: {{ $sponsor->level }}</h5>
                            <p class="card-text mb-4">
                                <span class="h4 d-block">$ {{ number_format($sponsor->price, 2) }}</span>
                                <small class="text-muted">Sponsorship Time: {{ $sponsor->sponsorship_time }} hours</small>
                            </p>

                            <!-- Link to the payment page -->
                            <a href="{{ route('admin.payment.show', ['sponsor' => $sponsor->id]) }}"
                                class="btn btn-lg btn-outline-primary rounded-pill px-4">Select Plan</a>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center py-3">
                            <small class="text-muted">Best for {{ $sponsor->level > 1 ? 'advanced' : 'beginners' }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
