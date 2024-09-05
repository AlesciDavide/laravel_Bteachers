<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index()
    {
        $reviews = Review::all();

        return view('reviews.index', compact("reviews"));
    }


    public function create()
    {
        $review = new Review();
        return view('reviews.create', compact('review'));
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $newReview = Review::create($data);

        return redirect()->route('admin.reviews.show', $newReview);
    }


    public function show(Review $review)
    {

        return view("reviews.show", compact("review"));
    }


    public function edit(string $id)
    {

    }


    public function update(Request $request, string $id)
    {

    }


    public function destroy(string $id)
    {

    }
}
