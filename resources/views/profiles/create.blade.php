@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <div class="col-12">
            <form action="{{ route('admin.profiles.store') }}" method="POST" id="creation_form" enctype="multipart/form-data">
                @csrf

                <div class="input-group-sm container mb-5 w-50">

                    {{-- <label for="nome">Nome</label>
                    <input type="text" class="form-control mb-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Nome progetto" id="nome" name="nome" value="{{ old('nome') }}"> --}}

                    <label for="address">Offire address</label>
                    <input type="text" class="form-control mb-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Office address" id="address" name="address" value="{{ old('address') }}">

                    <label for="telephone_number">Office telephone number</label>
                    <input type="text" class="form-control mb-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Office telephone number" id="telephone_number" name="telephone_number" value="{{ old('telephone_number') }}">


                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="service" name="service" style="height: 100px"></textarea>
                        <label for="service">Describe your services</label>
                    </div>


                    {{--  <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="visible" name="visible">
                        <label class="form-check-label" for="visible">
                            Public profile?
                        </label>
                    </div> --}}

                    <select class="form-select" aria-label="Default select example" id="visible" name="visible">
                        <option selected value="visible">Visible</option>
                        <option value="0">Invisible</option>
                    </select>

                    {{--  <label for="type_id">Tipo di progetto</label>
                    <select class="form-select form-select-sm mb-2" aria-label="Tipo di progetto" id="type_id" name="type_id">
                        @foreach ($types as $type)

                        <option value="{{$type->id}}">{{$type->nome}}</option>
                        @endforeach
                    </select>
--}}

                        {{-- <label for="technology_id">Linguaggio utilizzato</label>
                        <div class="customCheckBoxHolder d-flex flex-wrap ">
                            @foreach ($technologies as $technology)
                            <input name="technologies[]" type="checkbox" class="customCheckBoxInput" id="technology-check-{{$technology->id}}" autocomplete="off" value="{{$technology->id}}"
                            {{ in_array($technology->id, old('technologies', [])) ? "checked" : ""}}>
                            <label class="customCheckBoxWrapper m-1" for="technology-check-{{$technology->id}}" style="--dynamic-color: {{ $technology->colore }}">
                                <div class="customCheckBox">
                                    <div class="inner">{{$technology->nome}}</div>
                                </div>
                            </label>

                            @endforeach
                    </div> --}}



                    <div>
                        <label for="photo" class="form-label">Insert image profile</label>
                        <input class="form-control mb-3" type="file" id="photo" name="photo" accept="image/*">
                    </div>

                    <label for="cv" class="form-label">Insert your CV</label>
                    <input type="file" name="cv" id="cv" accept=".pdf">


                    <div class="d-flex justify-content-between ">

                            <input class="btn btn-primary" type="submit" value="crea un nuovo progetto">
                            <input class="btn btn-warning" type="reset" value="resetta campi">

                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection





