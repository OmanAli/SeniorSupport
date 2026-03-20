<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('volunteer_roles', function (Blueprint $table) {
            $table->id();
            $table->integer('role_order')->default(0);
            $table->string('role_title');
            $table->text('role_description');
            $table->string('role_icon');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('volunteer_roles');
    }
};