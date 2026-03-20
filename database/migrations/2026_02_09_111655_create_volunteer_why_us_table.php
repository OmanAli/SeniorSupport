<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('volunteer_why_us', function (Blueprint $table) {
            $table->id();
            $table->string('main_heading');
            $table->text('main_paragraph');
            $table->string('stats_number')->default('500+');
            $table->string('stats_text');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('volunteer_why_us');
    }
};