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
        Schema::create('profile_vote', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("profile_id");
            $table->foreign("profile_id")->references("id")->on("profiles");

            $table->unsignedBigInteger("vote_id");
            $table->foreign("vote_id")->references("id")->on("votes");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_vote');
    }
};
