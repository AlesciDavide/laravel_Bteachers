<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsors = Sponsor::all();

        return view('sponsors.index', compact('sponsors'));
    }

    /**
     * Attach the sponsor.id to the profile when a user purchase a plan.
     */

    public function purchase(Request $request, Sponsor $sponsor)
    {
        $profile = Auth::user()->profile; // Ottieni il profilo dell'utente autenticato

        // Controlla se il profilo ha già acquistato questo sponsor
        $existingSponsorship = $profile->sponsors()->where('sponsor_id', $sponsor->id)->first();

        if ($existingSponsorship) {
            // Aggiorna il tempo di sponsorizzazione sommando il nuovo tempo
            $profile->sponsors()->updateExistingPivot($sponsor->id, [
                'sponsorship_time' => $existingSponsorship->pivot->sponsorship_time + $sponsor->sponsorship_time
            ]);
        } else {
            // Aggiungi il nuovo sponsor al profilo
            $profile->sponsors()->attach($sponsor->id, [
                'sponsorship_time' => $sponsor->sponsorship_time
            ]);
        }

        return redirect()->back()->with('message', 'Sponsorship purchased successfully!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sponsor $sponsor)
    {
        return view('sponsors.show', compact('sponsor'));
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
