<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('donate_donor_recognition_texts', function (Blueprint $table) {
            $table->id();
            $table->string('section_heading')->default('Donor');
            $table->string('section_highlight')->default('Recognition');
            $table->text('section_description')->default('We deeply value every contribution. Every donor has the power to choose how they wish to be acknowledged.');
            $table->text('bottom_text')->default('Our donors are true partners in helping seniors find safe and appropriate care environments.');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donate_donor_recognition_texts');
    }
};