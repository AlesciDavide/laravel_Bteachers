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
        // Trova tutti i profili
        $profiles = Profile::all();

        foreach ($profiles as $profile) {
            // Controlla e aggiorna lo stato premium di ogni profilo
            $profile->checkAndUpdatePremiumStatus();
        }

        $this->info('Stato premium aggiornato per tutti i profili.');
    }
}
