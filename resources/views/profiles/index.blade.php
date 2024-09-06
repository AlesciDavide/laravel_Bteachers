@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-12">
            @if (session("message"))
            <div class="alert alert-danger">
                {{ session("message") }}
            </div>
            @endif
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telephone number</th>
                        <th scope="col">Specialization</th>
                        <th scope="col">Sponsor Level</th>
                        <th scope="col">Voti</th>
                        <th scope="col">Review_text</th>
                        <th scope="col">visible</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($profiles as $profile)

                    <tr>
                        <th scope="row">{{ $profile->id}}</th>

                        <td>
                            {{ $profile->cv}}

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
                            @foreach ( $profile->specializations as $specialization)
                                {{ $specialization->name}}
                            @endforeach
                        </td>
                        <td>
                            @foreach ( $profile->sponsors as $sponsor)
                                {{ $sponsor->level}}
                            @endforeach
                        </td>
                        <td>
                            @foreach ( $profile->votes as $vote)
                            {{ $vote->vote}}
                            @endforeach
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
                            <form action="{{ route('admin.profiles.destroy', $profile) }}" method="POST" class="delete-form">
                                @method("DELETE")
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>

                        <td>
                            <a class="btn btn-secondary" href="{{ route("admin.profiles.edit", $profile)}}">Modifica</a>
                        </td>

                    </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>

    </div>
</div>
@endsection
