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
                        <th scope="col">Price</th>
                        <th scope="col">Level</th>
                        <th scope="col">sponsorship_time</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <th scope="row">{{ $sponsor->id}}</th>

                        <td>
                            {{ $sponsor->name}}

                        </td>
                        <td>
                            {{ $sponsor->Price}}
                        </td>
                        <td>
                            {{ $sponsor->Level}}
                        </td>
                        <td>
                            {{ $sponsor->sponsorship_time}}
                        </td>

                    </tr>
                    </tbody>
                </table>
        </div>

    </div>
</div>
@endsection
