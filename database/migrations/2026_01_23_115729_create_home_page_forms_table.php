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
        Schema::create('home_page_forms', function (Blueprint $table) {
            $table->id();
            $table->string('form_heading')->nullable();
            $table->text('form_description')->nullable();
            $table->string('form_bulletPoint1')->nullable();
            $table->string('form_bulletPoint2')->nullable();
            $table->string('form_bulletPoint3')->nullable();
            $table->string('form_bulletPoint4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_forms');
    }
};
