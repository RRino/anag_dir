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
        Schema::create('anagraficas', function (Blueprint $table) {
            $table->id();
            $table->string('title',255)->nullable();
            $table->string('alias',300)->nullable();
            $table->string('nome',155);
            $table->string('cognome',155);
            $table->string('indirizzo',300)->nullable();
            $table->string('civico',25)->nullable();
            $table->string('cap',25)->nullable();
            $table->string('localita',255)->nullable();
            $table->string('comune',255)->nullable();
            $table->string('sigla_provincia',25)->nullable();
            $table->string('email',255)->nullable();
            $table->string('pec',55)->nullable();
            $table->string('codice_fiscale',55)->nullable();
            $table->string('partira_iva',55)->nullable();
            $table->string('telefono',55)->nullable();
            $table->string('cellulare',55)->nullable();
            $table->integer('id_tipo_socio')->default(0);
            $table->integer('id_tipo_consegna')->default(0);
            $table->integer('published')->default(0);
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anagraficas');
    }
};
