<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('donate_forms', function (Blueprint $table) {
            $table->id();
            $table->string('form_heading')->default('Make Your Gift Today');
            $table->string('form_subheading')->default('Your generosity today helps a senior find the right place to call home.');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donate_forms');
    }
};