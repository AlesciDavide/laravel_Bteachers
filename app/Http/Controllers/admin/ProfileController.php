<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Message;
use App\Models\Profile;
use App\Models\Specialization;
use App\Models\Sponsor;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        $specializations = Specialization::all();
        $sponsors = Sponsor::all();
        $votes = Vote::all();



        return view('profiles.index', compact('profiles', "specializations", "sponsors", "votes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {

        $user = Auth::user();
        $profiles = Profile::all();
        $specializations = Specialization::all();
        foreach ($profiles as $profileId) {
            if ($user->id == $profileId->user_id) {
                return redirect()->route('admin.profiles.show', $profileId)->with('message', "You already have a profile");
            }
        }

        return view('profiles.create', compact('user', 'specializations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {

        $user_id = Auth::user()->id;
        $data = $request->validated();
        $pdf_path = $request->file('cv')->store('uploads/cv', 'public');
        $img_path = $request->file('photo')->store('uploads/photo', 'public');
        $data['cv'] = $pdf_path;
        $data['photo'] = $img_path;

        $newProfile = new Profile($data);
        $newProfile->user_id = $user_id;
        $newProfile->specializations()->sync($data['specializations']);
        $newProfile->save();

        return redirect()->route('admin.profiles.show', ['profile' => $newProfile->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        $profile = Profile::with('votes')->findOrFail($profile->id);
        $votes = Vote::all(); // Voti disponibili (1-5)
        return view('profiles.show', compact('profile', 'votes'));
    }

    /* storeVote */
    public function storeVote(Request $request, $profileId)
    {
        $profile = Profile::findOrFail($profileId);
        $voteId = $request->input('vote'); // Qui ricevi il vote_id

        $profile->votes()->attach($voteId);

        return redirect()->back()->with('success', 'Voto aggiunto con successo!');
    }

    public function edit(Profile $profile)
    {
        $specializations = Specialization::all();
        return view('profiles.edit', compact('profile', 'specializations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile, Specialization $specialization)
    {
        $data = $request->validated();


        if (!$request->photo) {
            $data["photo"] = $profile->photo;
        } else {
            Storage::disk('public')->delete($profile->photo);
            $img_path = $request->file('photo')->store('uploads/photo', 'public');
            $data['photo'] = $img_path;
        }



        if (!$request->cv) {
            $data["cv"] = $profile->cv;
        } else {
            Storage::disk('public')->delete($profile->cv);
            $pdf_path = $request->file('cv')->store('uploads/cv', 'public');
            $data['cv'] = $pdf_path;
        }


            $profile->specializations()->sync($data['specializations']);

        $profile->update($data);

        return redirect()->route('admin.profiles.show', $profile)->with('message', "Profile has Been Edited");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->votes()->detach();
        $profile->specializations()->detach();
        $profile->sponsors()->detach();
        $profile->delete();
        Storage::disk('public')->delete($profile->photo);
        Storage::disk('public')->delete($profile->cv);
        return redirect()->route('admin.profiles.index')->with('message', "Profile  " . $profile->id . " has been Deleted");
    }
}
