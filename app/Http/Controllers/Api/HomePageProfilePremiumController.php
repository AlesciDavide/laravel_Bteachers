<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class HomePageProfilePremiumController extends Controller
{
    public function getPremiumProfiles(Request $request)
    {
        // Send only premium users
        $premiumProfiles = Profile::where('is_premium', true)->with("user", "reviews", "votes", "messages", "sponsors", "specializations")
            ->withAvg('votes', 'vote')
            ->where('visible', true)
            ->paginate(6);

        return response()->json([
            'success' => true,
            'results' => $premiumProfiles
        ]);
    }
}
