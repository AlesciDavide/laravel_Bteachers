@extends('layouts.app')

@section('content')

<div class="container my-5">
    <h1 class="mb-4">Payment History</h1>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Sponsor Name</th>
                    <th scope="col">Payment Date</th>
                    <th scope="col">Expiration Date</th>
                    <th scope="col">Sponsorship Level</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sponsorships as $sponsor)
                <tr>
                    <td>{{ $sponsor->name }}</td>
                    <td>{{ $sponsor->pivot->created_at->format('d/m/Y') }}</td>
                    <td>{{ $sponsor->pivot->expiration_date ? $sponsor->pivot->expiration_date : 'N/A' }}</td>
                    <td>{{ $sponsor->pivot->sponsor_id }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($sponsorships->isEmpty())
        <div class="alert alert-info mt-4" role="alert">
            No payments found for your profile.
        </div>
    @endif

    <div class="d-flex justify-content-center mt-4">
        {{ $sponsorships->links() }}
    </div>
</div>

@endsection
