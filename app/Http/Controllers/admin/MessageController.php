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
            // Manage the case the user doesn't have a profile created
            return redirect()->route('admin.profiles.create')->with('error', 'Profile not found');
        }
        // recover only the message of the used profile
        $messages = Message::where('profile_id', $profile->id)->orderBy('created_at', 'desc')->paginate(5);

        return view('messages.index', compact('messages'));
    }

    public function create(Profile $profile)
    {

        return abort(404);
    }

    public function store(StoreMessageRequest $request)
    {
        return abort(404);
    }

    public function show(Message $message)
    {
        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();

        if (!$profile) {
            // Manage the case the user doesn't have a profile created
            return redirect()->route('home')->with('error', 'Profile not found');
        }
        if ($message->profile_id !== $profile->id) {
            return redirect()->route('admin.messages.index')->with('error', 'You are not authorized to view this message');
        }
        return view('messages.show', compact('message'));
    }

    public function edit()
    {

        return abort(404);
    }
}
