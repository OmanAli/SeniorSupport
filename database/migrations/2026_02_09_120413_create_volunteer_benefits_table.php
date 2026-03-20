<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('volunteer_benefits', function (Blueprint $table) {
            $table->id();
            $table->integer('benefit_order')->default(0);
            $table->string('benefit_title');
            $table->text('benefit_description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('volunteer_benefits');
    }
};