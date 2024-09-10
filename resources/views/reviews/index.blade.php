@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Elenco delle Recensioni
                </div>
                <div class="card-body">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Cognome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Testo Recensione</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $review)
                            <tr>
                                <th scope="row">{{ $review->id }}</th>
                                <td>{{ $review->name }}</td>
                                <td>{{ $review->surname }}</td>
                                <td>{{ $review->email }}</td>
                                <td>{{ $review->review_text }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
