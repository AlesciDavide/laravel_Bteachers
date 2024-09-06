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
        Schema::create('profile_specialization', function (Blueprint $table) {
            $table->unsignedBigInteger("profile_id");
            $table->foreign("profile_id")->references("id")->on("profiles");

            $table->unsignedBigInteger("specialization_id");
            $table->foreign("specialization_id")->references("id")->on("specializations");

            $table->primary(["profile_id", "specialization_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_specialization');
    }
};
