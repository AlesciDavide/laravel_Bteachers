<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Message;
use App\Models\Profile;
use App\Models\Review;
use App\Models\Specialization;
use App\Models\Sponsor;
use App\Models\User;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        // $profiles = Profile::all();

        // Recupera l'utente autenticato
        $user = auth()->user();

        // Trova il profilo associato all'utente autenticato
        $profile = Profile::where('user_id', $user->id)->first();
        if (!$profile) {
            return redirect()->route('admin.profiles.create')
                ->with('message', 'Il profilo non esiste. Verrai reindirizzato alla pagina principale.');
        }
        $specializations = Specialization::all();
        $sponsors = Sponsor::all();
        $votes = Vote::all();
        $existingSponsorship = $profile->sponsors()->where('profile_id', $profile->id)->get()->last();



        return view('profiles.index', compact('profile', "specializations", "sponsors", "votes"));
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

        $newProfile->save();
        $newProfile->specializations()->sync($data['specializations']);


        return redirect()->route('admin.profiles.show', ['profile' => $newProfile->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        $user = auth()->user();

        // Trova il profilo associato all'utente autenticato
        $profile = Profile::where('user_id', $user->id)->first();

        $profile = Profile::with('votes')->findOrFail($profile->id);
        $votes = Vote::all(); // Voti disponibili (1-5)
        $profile->checkAndUpdatePremiumStatus();

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
        // Recupera l'utente autenticato
        $user = auth()->user();

        // Trova il profilo associato all'utente autenticato
        $profile = Profile::where('user_id', $user->id)->first();

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



        $profile->update($data);
        $profile->specializations()->sync($data['specializations']);

        return redirect()->route('admin.profiles.show', $profile)->with('message', "Profile has Been Edited");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        // Recupera l'utente autenticato
        $user = auth()->user();

        // Trova il profilo associato all'utente autenticato
        $profile = Profile::where('user_id', $user->id)->first();

        $profile->votes()->detach();
        $profile->specializations()->detach();
        $profile->sponsors()->detach();
        $profile->delete();
        Storage::disk('public')->delete($profile->photo);
        Storage::disk('public')->delete($profile->cv);
        return redirect()->route('admin.profiles.create')->with('message', "Profile has been Deleted");
    }

    public function statisticsPage()
    {

        $user = auth()->user();
        $profile = $user->profile;

        // Conta i messaggi e recensioni per mese/anno
        $messagesPerMonth = Message::where('profile_id', $profile->id)
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->get();

        $reviewsPerMonth = Review::where('profile_id', $profile->id)
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->get();

        // Fasce di voto per mese/anno
        $votesPerMonth = DB::table('profile_vote')
            ->where('profile_id', $profile->id)
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count, vote_id')
            ->groupBy('year', 'month', 'vote_id')
            ->get();

        return view('profiles.statistic', compact('messagesPerMonth', 'reviewsPerMonth', 'votesPerMonth'));
    }
}
