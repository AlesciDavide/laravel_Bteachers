@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session("message"))
        <div class="alert alert-danger">
            {{ session("message") }}
        </div>
        @endif
        <div class="col-12">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telephone number</th>
                        <th scope="col">Review_text</th>
                        <th scope="col">visible</th>
                    </tr>
                    </thead>
                    <tbody>


                    <tr>
                        <th scope="row">{{ $profile->id }}</th>

                        <td>
                            <embed src="{{ asset('storage/' . $profile->cv) }}" width="500" height="375"
                            type="application/pdf">

                        </td>
                        <td>
                            <img class="img-fluid w-20" src="{{ asset('storage/' . $profile->photo) }}" alt="">
                        </td>
                        <td>
                            {{ $profile->address}}
                        </td>
                        <td>
                            {{ $profile->telephone_number}}
                        </td>
                        <td>
                            {{ $profile->service}}
                        </td>
                        <td>
                            @if ($profile->visible == true)
                                Yes
                            @else
                                No
                            @endif

                        </td>
                        <td>
                            @foreach ($profile->reviews as $review)
                                {{$review->id}}
                                {{$review->name}}
                                {{$review->review_text}}
                            @endforeach

                        </td>
                        <td>
                        <a class="btn btn-primary" href="{{ route("admin.profiles.edit", $profile)}}">
                            Modifica profilo
                        </a>
                        <a class="btn btn-primary" href="{{ route('reviews.create', $profile->id) }}">
                            Invia recensione
                        </a>

                    </td>
                    </tr>
                    </tbody>
                </table>
        </div>

    </div>
</div>
@endsection
