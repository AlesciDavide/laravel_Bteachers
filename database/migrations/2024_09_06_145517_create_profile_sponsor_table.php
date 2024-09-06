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
        Schema::create('profile_sponsor', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("profile_id");
            $table->foreign("profile_id")->references("id")->on("profiles");

            $table->unsignedBigInteger("sponsor_id");
            $table->foreign("sponsor_id")->references("id")->on("sponsors");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_sponsor');
    }
};
