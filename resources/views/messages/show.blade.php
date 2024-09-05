@extends('layouts.app')

@section('content')
<ul>
    <li>
        {{$message->name}}
    </li><li>
        {{$message->surname}}
    </li><li>
        {{$message->email}}
    </li><li>
        {{$message->telephone_number}}
    </li><li>
        {{$message->message_text}}
    </li>
</ul>
@endsection
