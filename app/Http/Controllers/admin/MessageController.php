<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();

        return view('messages.index', compact('messages'));
    }

    public function create(){
        $message = new Message();
        return view('messages.create', compact('message'));
    }

    public function store(StoreMessageRequest $request){
        $data = $request->validated();

        $message = Message::create($data);
        $message->save();
        return redirect()->route('admin.messages.show', ['message' => $message->id]);
    }

    public function show(Message $message){
        return view('messages.show', compact('message'));
    }


}
