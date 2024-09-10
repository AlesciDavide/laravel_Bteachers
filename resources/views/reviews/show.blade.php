@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Dettagli Recensione
                </div>
                <div class="card-body">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Cognome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Testo della Recensione</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{ $review->id }}</th>
                                <td>{{ $review->name }}</td>
                                <td>{{ $review->surname }}</td>
                                <td>{{ $review->email }}</td>
                                <td>{{ $review->review_text }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-3">
                        <a href="{{ route('admin.reviews.index') }}" class="btn btn-primary">
                            Torna all'elenco delle recensioni
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
