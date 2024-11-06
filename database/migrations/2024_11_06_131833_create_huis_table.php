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
        Schema::create('huis', function (Blueprint $table) {
            $table->string("address")->unique();
            $table->string("city");
            $table->unsignedBigInteger("eigenaar_id");

            $table->foreign("eigenaar_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('huis', function (Blueprint $table) {
            $table->dropForeign('location_owner_foreign');
        });
        Schema::dropIfExists('huis');
    }
};
