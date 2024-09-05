<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();

        return view('reviews.index', compact("reviews"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $review = new Review();
        return view('reviews.create', compact('review'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newReview = Review::create($data);

        return redirect()->route('admin.reviews.show', $newReview);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {

        return view("reviews.show", compact("review"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
