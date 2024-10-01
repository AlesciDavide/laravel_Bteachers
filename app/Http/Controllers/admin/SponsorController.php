<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Sponsor;
use Braintree\Gateway;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SponsorController extends Controller
{
    protected $gateway;

    public function __construct()
    {
        $this->gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey'),
        ]);
    }
    public function index()
    {
        $sponsors = Sponsor::all();
        $clientToken = $this->gateway->clientToken()->generate(); // Generate braintree tokens
        return view('sponsors.index', compact('sponsors', 'clientToken'));
    }

    /**
     * Attach the sponsor.id to the profile when a user purchase a plan.
     */
    public function purchase(Sponsor $sponsor)
    {
        $profile = Auth::user()->profile; // Obtain authenticated profile
        $sponsorId = $sponsor->id;
        return redirect()->route('payment.page', ['sponsor' => $sponsorId]);
    }

    public function updateSponsorship(Sponsor $sponsor)
    {
        $profile = Auth::user()->profile;

        // check if the profile had alrady buyed the sponsorship
        $existingSponsorship = $profile->sponsors()->where('profile_id', $profile->id)->get()->last();
        if ($existingSponsorship === null) {
            $currentDate = null;
        } else {
            $currentDate = $existingSponsorship->pivot->expiration_date;
        }

        $timezone = 'Europe/Rome';
        //Condition for different level of sponsorship
        if ($sponsor->sponsorship_time === 24) {
            if ($currentDate != null) {
                $newDateTime = Carbon::parse($currentDate, $timezone)->addDay(1);
            } else {
                $newDateTime = Carbon::now($timezone)->addDay(1);
            }
        } elseif ($sponsor->sponsorship_time === 72) {
            if ($currentDate != null) {
                $newDateTime = Carbon::parse($currentDate, $timezone)->addDay(3);
            } else {
                $newDateTime = Carbon::now($timezone)->addDay(3);
            }
        } else {
            if ($currentDate != null) {
                $newDateTime = Carbon::parse($currentDate, $timezone)->addDay(6);
            } else {
                $newDateTime = Carbon::now($timezone)->addDay(6);
            }
        };




        //Add new sponsorship to the profile
        $profile->sponsors()->attach($sponsor->id, [
            'sponsorship_time' => $sponsor->sponsorship_time,
            'expiration_date' => $newDateTime

        ]);

        $isPremium = $newDateTime->isFuture();

        $profile->is_premium = $isPremium;
        $profile->save();

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
