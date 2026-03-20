<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('donate_heroes', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->default('Become a Hero');
            $table->string('subheading')->default('Be the Reason a Senior Finds the Right Home.');
            $table->text('description')->default('Your generosity fuels our mission...');
            $table->string('button_text')->default('Donate Now');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donate_heroes');
    }
};