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
        $reviews = Review::all();

        return view('reviews.index', compact("reviews"));
    }


    public function create(Profile $profile)

    {

        return view('reviews.create', compact('profile'));
    }


    public function store(StoreReviewRequest $request)
    {
        $data = $request->validated();

        $newReview = new Review();
        $newReview->name = $data['name'];
        $newReview->surname = $data['surname'];
        $newReview->email = $data['email'];
        $newReview->review_text = $data['review_text'];
        $newReview->profile_id = $data['profile_id'];

        $newReview->save();



        return redirect()->route('admin.reviews.show', $newReview);
    }


    public function show(Review $review)
    {

        return view("reviews.show", compact("review"));
    }


    public function edit(string $id) {}


    public function update(Request $request, string $id) {}


    public function destroy(string $id) {}
}
