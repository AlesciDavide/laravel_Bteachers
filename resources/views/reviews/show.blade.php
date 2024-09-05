@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-12">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">name</th>
                        <th scope="col">surname</th>
                        <th scope="col">emial</th>
                        <th scope="col">review_text</th>
                    </tr>
                    </thead>
                    <tbody>
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
                    </tbody>
                </table>
        </div>

    </div>
</div>
@endsection
