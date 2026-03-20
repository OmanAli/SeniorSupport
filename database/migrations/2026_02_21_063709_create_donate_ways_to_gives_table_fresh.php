<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('donate_ways_to_gives', function (Blueprint $table) {
            $table->id();
            // Section Texts
            $table->string('section_heading')->default('Ways to');
            $table->string('section_highlight')->default('Give');
            $table->text('section_subheading')->default('Choose the giving option that works best for you.');
            // Card Fields
            $table->integer('order')->default(1);
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donate_ways_to_gives');
    }
};