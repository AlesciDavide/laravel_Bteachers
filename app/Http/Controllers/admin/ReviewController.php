<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Models\Profile;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index()
    {
        // $reviews = Review::all();


        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();

        if (!$profile) {
            return redirect()->route('admin.profiles.create')->with('error', 'Profile not found');
        }
        // Recupera le reviews associati al profilo dell'utente
        $reviews = Review::where('profile_id', $profile->id)->paginate(5);

        return view('reviews.index', compact("reviews"));
    }


    public function create(Profile $profile)

    {
        return view('home');
    }


    public function store(StoreReviewRequest $request)
    {
        // $data = $request->validated();

        // $newReview = new Review();
        // $newReview->name = $data['name'];
        // $newReview->surname = $data['surname'];
        // $newReview->email = $data['email'];
        // $newReview->review_text = $data['review_text'];
        // $newReview->profile_id = $data['profile_id'];

        // $newReview->save();



        // return redirect()->route('admin.reviews.show', $newReview);
        return view('home');
    }


    public function show(Review $review)
    {
        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();

        if (!$profile) {
            // Gestisci il caso in cui non esista un profilo per l'utente
            return redirect()->route('home')->with('error', 'Profile not found');
        }
        if ($review->profile_id !== $profile->id) {
            return redirect()->route('admin.reviews.index')->with('error', 'You are not authorized to view this review');
        }

        return view("reviews.show", compact("review"));
    }


    public function edit(string $id)
    {
        return view('home');
    }


    public function update(Request $request, string $id) {}


    public function destroy(string $id) {}
}
