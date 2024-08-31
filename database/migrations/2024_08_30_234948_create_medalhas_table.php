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
        Schema::create('medalhas', function (Blueprint $table) {
            $table->id("idMedalha")->key;
            $table->string('tipoMedalha', 250);
            $table->string('modalidade', 250);
            $table->unsignedBigInteger('idAtleta');
            $table->timestamps();
        });

        Schema::table('medalhas', function (Blueprint $table) {
            $table->foreign('idAtleta')->references('idAtleta')->on('Atletas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medalhas');
    }
};
