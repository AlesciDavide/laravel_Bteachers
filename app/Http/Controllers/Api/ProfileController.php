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
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function index(Request $request, Profile $profile)
    {
        $query = Profile::with("user", "reviews", "votes", "messages", "sponsors", "specializations")
            ->withCount('reviews')
            ->withAvg('votes', 'vote')
            ->where('visible', true); // la query cerca solo coloro che hanno visible true

        // Recupera il valore di searchQuery dal request
        $searchQuery = $request->input('searchQuery');

        // Filtro per specializzazione o nome se searchQuery è presente nel request
        if ($searchQuery) {
            /*  $query->whereHas('specializations', function ($q) use ($searchQuery) {
            $q->where('name', 'like', "%{$searchQuery}%");
        }) */
            $searchTerms = explode(' ', $searchQuery);

            // Se ci sono due termini di ricerca
            if (count($searchTerms) === 2) {
                $firstTerm = $searchTerms[0];
                $secondTerm = $searchTerms[1];

                $query->whereHas('user', function ($q) use ($firstTerm, $secondTerm) {
                    $q->where(function ($query) use ($firstTerm, $secondTerm) {
                        // Verifica nome e cognome in entrambi gli ordini
                        $query->where('name', 'like', "%{$firstTerm}%")
                            ->where('surname', 'like', "%{$secondTerm}%");
                    })->orWhere(function ($query) use ($firstTerm, $secondTerm) {
                        $query->where('name', 'like', "%{$secondTerm}%")
                            ->where('surname', 'like', "%{$firstTerm}%");
                    });
                });
            } else {
                $query->whereHas('user', function ($q) use ($searchQuery) {
                    $q->where('name', 'like', "%{$searchQuery}%")
                        ->orWhere('surname', 'like', "%{$searchQuery}%");
                });
            }
        }

        // Filtro per specializzazione se è presente nel request
        if ($request->has('specialization')) {
            $query->whereHas('specializations', function ($q) use ($request) {
                $q->where('field', $request->input('specialization'));
            });
        }

        if ($request->has('min_vote')) {
            $query->having('votes_avg_vote', '>=', $request->input('min_vote'));
        }
        if ($request->has('reviews_count')) {
            $nReviews = $request->input('reviews_count');
            $query->having('reviews_count', '>=', $nReviews); // Filtra per il numero minimo di recensioni
        }

        if ($request->has('order_by')) {
            $orderBy = $request->input('order_by');
            $orderDirection = $request->input('order_direction', 'asc');

            if (in_array($orderBy, ['votes_avg_vote', 'reviews_count']) && in_array($orderDirection, ['asc', 'desc'])) {
                $query->orderBy($orderBy, $orderDirection);
            }
        }


        $profiles = $query
            ->orderBy('is_premium', 'DESC')->paginate(9);


        return response()->json([
            'success' => true,
            'results' => $profiles
        ]);
    }

    /**
     * Show the form for creating the resource.
     */
    public function create() {}

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // store reviews
        if (!empty($data['reviews'])) {
            foreach ($data['reviews'] as $reviewData) {
                // review data validation
                $validator = Validator::make($reviewData, [
                    'profile_id' => 'required|exists:profiles,id',
                    'name' => 'nullable|string|min:3|max:100',
                    'surname' => 'nullable|string|min:3|max:100',
                    'email' => 'required|string|max:255',
                    'review_text' => 'required|max:3000',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'error' => 'Errore in review data',
                    ],);
                }
                // create review
                $review = Review::create($reviewData);
                $review->save();
            }
        }
        // store messages
        if (!empty($data['messages'])) {
            foreach ($data['messages'] as $messageData) {
                // message data validation
                $validator = Validator::make($messageData, [
                    'profile_id' => 'required|exists:profiles,id',
                    'name' => 'nullable|string|min:3|max:100',
                    'surname' => 'nullable|string|min:3|max:100',
                    'email' => 'required|string|max:255',
                    'telephone_number' => 'nullable|min:6|max:20',
                    'message_text' => 'required|max:3000',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'error' => 'Errore in message data',
                    ],);
                }
                // create message
                $message = Message::create($messageData);
                $message->save();
            }
        }
        if (!empty($data['votes'])) {
            foreach ($data['votes'] as $voteData) {
                // vote data validation
                $validator = Validator::make($voteData, [
                    'profile_id' => 'required|exists:profiles,id',
                    'vote_id' => 'required|exists:votes,id',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'error' => 'Errore nei dati del vote',
                    ],);
                }

                $profile = Profile::findOrFail($voteData['profile_id']);
                $profile->votes()->attach($data['votes']);
            }
        }
    }

    /**
     * Display the resource.
     */
    public function show(Profile $profile)
    {
        $profile->loadMissing("user", "reviews", "votes", "messages", "sponsors", "specializations");
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
