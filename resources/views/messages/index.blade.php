@extends('layouts.app')
@section('content')
<ul>
    @foreach ($messages as $message)

    @endforeach
    <li>
        {{$message->name}} - {{$message->surname}}
        {{$message->email}}
        <p>
            {{$message->message_text}}
            {{$message->telephone_number}}
        </p>
    </li>
</ul>
@endsection
