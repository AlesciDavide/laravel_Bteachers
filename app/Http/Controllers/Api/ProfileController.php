<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index()
    {
        $profiles = Profile::with("user","reviews", "votes", "messages", "sponsors", "specializations")->paginate(10);
        return response()->json([
            'success' => true,
            'results' => $profiles
        ]);
    }

    /**
     * Show the form for creating the resource.
     */
    public function create(): never
    {

    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request): never
    {
        abort(404);
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
