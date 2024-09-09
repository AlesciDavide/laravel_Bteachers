@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-center">

    {{-- <a class=" w-25 btn btn-primary  " href="{{ route('admin.messages.create')}}"  aria-current="page">
        crea
    </a> --}}
</div>
<ul>
    @foreach ($messages as $message)

    <li>
        {{$message->name}} - {{$message->surname}}
        {{$message->email}}
        <p>
            {{$message->message_text}}
            {{$message->telephone_number}}
        </p>
    </li>
    @endforeach
</ul>
@endsection
