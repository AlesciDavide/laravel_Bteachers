<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();

        return view('profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {

        $user = Auth::user();
        $profiles = Profile::all();
        foreach ($profiles as $profileId) {
            if ($user->id == $profileId->user_id) {
                return redirect()->route('admin.profiles.show', $profileId)->with('message', "Profile has Been Edited");
            }
        }

        return view('profiles.create' , compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user_id = Auth::user()->id;
        $data = $request->all();
        $pdf_path = $request->file('cv')->store('uploads/cv', 'public');
        $data['cv'] = $pdf_path;
        $img_path = $request->file('photo')->store('uploads/photo', 'public');
        $data['photo'] = $img_path;

        $newProfile = new Profile($data);
        $newProfile->user_id = $user_id;
        $newProfile->save();

        return redirect()->route('admin.profiles.show', ['profile' => $newProfile->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $data = $request->all();


        if (!$request->photo) {
            $data["photo"] = $profile->photo;
        }else{
            Storage::disk('public')->delete($profile->photo);
            $img_path = $request->file('photo')->store('uploads/photo', 'public');
            $data['photo'] = $img_path;
        }



        if (!$request->cv) {
            $data["cv"] = $profile->cv;
        }else{
            Storage::disk('public')->delete($profile->cv);
            $pdf_path = $request->file('cv')->store('uploads/cv', 'public');
            $data['cv'] = $pdf_path;
        }



        $profile->update($data);
        return redirect()->route('admin.profiles.show', $profile)->with('message', "Profile has Been Edited");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        Storage::disk('public')->delete($profile->photo);
        Storage::disk('public')->delete($profile->cv);
        return redirect()->route('admin.profiles.index')->with('message', "Profile  " . $profile->id . " has been Deleted");
    }
}
