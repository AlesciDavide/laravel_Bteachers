<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Sponsor;
use App\Models\Vote;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
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

    public function showPaymentPage($sponsorId)
    {
        $sponsor = Sponsor::findOrFail($sponsorId);
        $clientToken = $this->gateway->clientToken()->generate();
        return view('sponsors.payment', compact('clientToken', 'sponsor'));
    }

    public function checkout(Request $request, $sponsorId, Profile $profile)
    {
        $nonce = $request->input('payment_method_nonce');
        $sponsor = Sponsor::findOrFail($sponsorId);
        $amount = $sponsor->price;

        $result = $this->gateway->transaction()->sale([
            'amount' => number_format($amount, 2),
            'paymentMethodNonce' => $nonce,
            'options' => ['submitForSettlement' => true]
        ]);
        $profile = Auth::user()->profile;
        $votes = Vote::all();
        if ($result->success) {
            // Update the db only if the payment is done
            app('App\Http\Controllers\admin\SponsorController')->updateSponsorship($sponsor);
            $expirationData = $profile->sponsors()->orderBy('pivot_expiration_date', 'desc')->first();
            /* return response()->json(['success' => true, 'transaction' => $result->transaction]); */
            return view('profiles.show', compact('profile', 'votes', 'expirationData'));
        } else {
            $sponsors = Sponsor::all();
            $clientToken = $this->gateway->clientToken()->generate(); // Generate the braintree tokens
            return view('sponsors.index', compact('sponsors', 'clientToken'));
        }
    }
}
