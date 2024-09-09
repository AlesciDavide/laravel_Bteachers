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
        Schema::table('reviews', function (Blueprint $table) {
            // Rimozione di Unique() e potenzialmente nullable() se non serve
            $table->unsignedBigInteger("profile_id")->after("id");
            $table->foreign("profile_id")->references("id")->on("profiles")->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(["profile_id"]);
            $table->dropColumn("profile_id");
        });
    }
};
