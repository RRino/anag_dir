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
        Schema::create('rinnovo', function (Blueprint $table) {
            $table->id();
            $table->integer('id_socio');
            $table->date('data_iscrizione')->nullable();
            $table->date('data_rinnovo')->nullable('');;
            $table->text('description')->default('');;
            $table->integer('published')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rinnovo');
    }
};
