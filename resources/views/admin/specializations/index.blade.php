@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-12">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Campo di Appartenenza</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($specializations as $specialization)

                    <tr>
                        <th scope="row">{{ $specialization->id}}</th>

                        <td>
                            {{ $specialization->name}}

                        </td>
                        <td>
                            {{ $specialization->field}}

                        </td>

                    </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>

    </div>
</div>
@endsection
