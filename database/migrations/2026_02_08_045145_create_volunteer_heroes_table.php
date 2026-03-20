<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('volunteer_heroes', function (Blueprint $table) {
            $table->id();
            $table->string('hero_heading');
            $table->string('hero_subtitle');
            $table->text('hero_paragraph')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('volunteer_heroes');
    }
};