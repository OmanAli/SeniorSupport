<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('donate_ways_to_gives', function (Blueprint $table) {
            $table->dropColumn(['section_heading', 'section_highlight', 'section_subheading']);
        });
    }

    public function down()
    {
        Schema::table('donate_ways_to_gives', function (Blueprint $table) {
            $table->string('section_heading')->default('Ways to');
            $table->string('section_highlight')->default('Give');
            $table->text('section_subheading')->default('Choose the giving option that works best for you.');
        });
    }
};