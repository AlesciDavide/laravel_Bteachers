<?php

namespace App\Console\Commands;

use App\Models\Profile;
use Illuminate\Console\Command;

class UpdatePremiumStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-premium-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Find all profile
        $profiles = Profile::all();

        foreach ($profiles as $profile) {
            // check and update the state of every premium profile
            $profile->checkAndUpdatePremiumStatus();
        }

        $this->info('Premium updated for all profiles.');
    }
}
