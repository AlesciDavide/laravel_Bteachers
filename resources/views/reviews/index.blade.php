@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-12">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Review_text</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($reviews as $review)

                    <tr>
                        <th scope="row">{{ $review->id}}</th>

                        <td>
                            {{ $review->name}}

                        </td>
                        <td>
                            {{ $review->surname}}
                        </td>
                        <td>
                            {{ $review->email}}
                        </td>
                        <td>
                            {{ $review->review_text}}
                        </td>

                    </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>

    </div>
</div>
@endsection
