<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('donate_form_extra_texts', function (Blueprint $table) {
            $table->id();
            $table->string('secure_text')->default('Secure online donations accepted.');
            $table->string('contact_heading')->default('For questions about donations, partnerships, or planned giving, please contact:');
            $table->string('email_text')->default('info@myseniorsupportsolutions.com');
            $table->string('phone_text')->default('772-262-9721');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donate_form_extra_texts');
    }
};