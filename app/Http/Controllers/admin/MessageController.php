<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use App\Models\Profile;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();

        if (!$profile) {
            // Gestisci il caso in cui non esista un profilo per l'utente
            return redirect()->route('admin.profiles.create')->with('error', 'Profile not found');
        }
        // Recupera i messaggi associati al profilo dell'utente
        $messages = Message::where('profile_id', $profile->id)->get();

        return view('messages.index', compact('messages'));
    }

    public function create(Profile $profile)
    {

        return view('home');
    }

    public function store(StoreMessageRequest $request)
    {
        // $data = $request->validated();
        // $message = Message::create($data);
        // $message->save();
        // return redirect()->route('admin.messages.show', ['message' => $message->id]);
        return view('home');
    }

    public function show(Message $message)
    {
        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();

        if (!$profile) {
            // Gestisci il caso in cui non esista un profilo per l'utente
            return redirect()->route('home')->with('error', 'Profile not found');
        }
        if ($message->profile_id !== $profile->id) {
            return redirect()->route('admin.messages.index')->with('error', 'You are not authorized to view this message');
        }
        return view('messages.show', compact('message'));
    }

    public function edit()
    {

        return view('home');
    }
}
