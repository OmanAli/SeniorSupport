<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('donate_where_money_goes_texts', function (Blueprint $table) {
            $table->id();
            $table->string('section_heading')->default('Where Your');
            $table->string('section_highlight')->default('Money Goes');
            $table->text('section_description')->default('We are committed to financial transparency. Your donations are directly allocated toward making a real difference in the lives of seniors.');
            $table->text('quote_text')->default('We believe in responsible stewardship and measurable impact.');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donate_where_money_goes_texts');
    }
};