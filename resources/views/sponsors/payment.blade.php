@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
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

                        <!-- Form for the payment -->
                        <form id="payment-form-{{ $sponsor->id }}"
                            action="{{ route('admin.payment.checkout', ['sponsor' => $sponsor->id]) }}" method="POST">
                            @csrf
                            <div id="dropin-container-{{ $sponsor->id }}"></div>
                            <input type="hidden" name="payment_method_nonce" id="nonce-{{ $sponsor->id }}">
                            <button type="submit" class="btn btn-lg btn-outline-primary rounded-pill px-4">Pay Now</button>
                        </form>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-center py-3">
                        <small class="text-muted">Best for {{ $sponsor->level > 1 ? 'advanced' : 'beginners' }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
    @vite('resources/js/validation/payment.js')
@endsection

@section('script_payment')
    <script src="https://js.braintreegateway.com/web/dropin/1.32.0/js/dropin.min.js"></script>
    <script>
        window.clientToken = '{{ $clientToken }}';
    </script>
@endsection
