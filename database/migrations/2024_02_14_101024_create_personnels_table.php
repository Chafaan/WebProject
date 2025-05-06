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
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('nomComplet_arb');
            $table->string('ppr',7)->unique();
            $table->string('status');
            $table->string('profession');
            $table->string('sexe',1);
            $table->date('datenaisf');
            $table->string('email')->unique();
            $table->date('date_rec_estbm');
            $table->date('date_rec_minis');
            $table->unsignedBigInteger('id_grade');
            $table->unsignedBigInteger('id_dep');
            $table->unsignedBigInteger('id_diplome');
            $table->unsignedBigInteger('id_specialite');
            $table->foreign('id_grade')->references('id')->on('grades');
            $table->foreign('id_dep')->references('id')->on('deps');
            $table->foreign('id_diplome')->references('id')->on('diplomes');
            $table->foreign('id_specialite')->references('id')->on('specialites');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnels');
    }
};
