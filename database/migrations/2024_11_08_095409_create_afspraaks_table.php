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
        Schema::create('afspraken', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('huisdier_id');
            $table->unsignedBigInteger('eigenaar_id');
            $table->string('start_datum');
            $table->string('eind_datum');
            $table->time('tijd_start');
            $table->time('tijd_eind');
            $table->decimal('uurtarief', 8, 2);
            $table->string('status', 50)->default('gepland');
            $table->text('opmerkingen')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('huisdier_id')->references('id')->on('huisdier')->onDelete('cascade');
            $table->foreign('eigenaar_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('afspraken');
    }
};
