<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('profile_sponsor', function (Blueprint $table) {
            $table->unsignedTinyInteger('sponsorship_time')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profile_sponsor', function (Blueprint $table) {
            $table->dropColumn('sponsorship_time');
        });
    }
};
