<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Profile;
use App\Models\Review;
use App\Models\Specialization;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index(Request $request)
{
    $query = Profile::with("user","reviews", "votes", "messages", "sponsors", "specializations");

    // Filtro per specializzazione se è presente nel request
    if ($request->has('specialization')) {
        $query->whereHas('specializations', function ($q) use ($request) {
            $q->where('field', $request->input('specialization'));
        });
    }

    $profiles = $query->paginate(10);

    return response()->json([
        'success' => true,
        'results' => $profiles
    ]);
}

    /**
     * Show the form for creating the resource.
     */
    public function create()
    {

    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if(!empty($data['reviews'])) {
            foreach ($data['reviews'] as $reviewData) {
                $review = Review::create($reviewData);
                $review->save();
            }
        }
        if(!empty($data['messages'])) {
            foreach ($data['messages'] as $messageData) {
                $message = Message::create($messageData);
                $message->save();
            }
        }
        if(!empty($data['votes'])) {
            foreach ($data['votes'] as $voteData) {
                $vote = Vote::create($voteData);
                $vote->save();
            }
        }
    }

    /**
     * Display the resource.
     */
    public function show(Profile $profile)
    {
        $profile->loadMissing("user","reviews", "votes", "messages", "sponsors", "specializations");
        return response()->json([
            'success' => true,
            'results' => $profile
        ]);
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
