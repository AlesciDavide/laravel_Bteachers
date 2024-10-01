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
        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();

        if (!$profile) {
            return redirect()->route('admin.profiles.create')->with('error', 'Profile not found');
        }
        // Find the reviews linked to the using profile
        $reviews = Review::where('profile_id', $profile->id)->orderBy('created_at', 'desc')->paginate(5);

        return view('reviews.index', compact("reviews"));
    }


    public function create(Profile $profile)

    {
        return abort(404);
    }


    public function store(StoreReviewRequest $request)
    {
        return abort(404);
    }


    public function show(Review $review)
    {
        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();

        if (!$profile) {

            return redirect()->route('home')->with('error', 'Profile not found');
        }
        if ($review->profile_id !== $profile->id) {
            return redirect()->route('admin.reviews.index')->with('error', 'You are not authorized to view this review');
        }

        return view("reviews.show", compact("review"));
    }


    public function edit(string $id)
    {
        return abort(404);
    }


    public function update(Request $request, string $id) {}


    public function destroy(string $id) {}
}
