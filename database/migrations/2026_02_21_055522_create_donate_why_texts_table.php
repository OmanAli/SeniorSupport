<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('donate_why_texts', function (Blueprint $table) {
            $table->id();
            $table->string('section_heading')->default('Why');
            $table->string('section_highlight')->default('Donate');
            $table->text('section_description')->default('At Senior Support Solutions, we believe every senior deserves dignity, safety, and the right care environment. Your donation directly supports families searching for assisted living, memory care, and long-term support options.');
            $table->string('sub_heading')->default('When you give, you help:');
            $table->text('bottom_text')->default('Your support is not just a gift — it is an investment in stability, security, and compassionate care for seniors.');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donate_why_texts');
    }
};