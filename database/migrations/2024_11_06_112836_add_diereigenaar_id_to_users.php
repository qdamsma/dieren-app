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
        Schema::table('huisdier', function (Blueprint $table) {
            $table->unsignedBigInteger('eigenaar_id')->after('id');
            $table->foreign('eigenaar_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('huisdier', function (Blueprint $table) {
            $table->dropForeign(['eigenaar_id']);
            $table->dropColumn('eigenaar_id');
        });
    }
};
