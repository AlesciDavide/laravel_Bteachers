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
                        <th scope="col">Vote</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($votes as $vote)

                    <tr>
                        <th scope="row">{{ $vote->id}}</th>

                        <td>
                            {{ $vote->name}}

                        </td>
                        <td>
                            {{ $vote->vote}}

                        </td>

                    </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>

    </div>
</div>
@endsection
