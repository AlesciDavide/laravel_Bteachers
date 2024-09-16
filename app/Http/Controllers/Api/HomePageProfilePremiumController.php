<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class HomePageProfilePremiumController extends Controller
{
    public function getPremiumProfiles(Request $request)
{
    // Recupera solo gli utenti con profilo premium
    $premiumProfiles = Profile::where('is_premium', true)->with("user", "reviews", "votes", "messages", "sponsors", "specializations")->paginate(5);

    // Restituisce i risultati come JSON
    return response()->json([
        'success' => true,
        'results' => $premiumProfiles
    ]);
}
}
