<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('donate_why_donates', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->default(1);
            $table->string('title');
            $table->text('description');
            $table->string('icon');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donate_why_donates');
    }
};