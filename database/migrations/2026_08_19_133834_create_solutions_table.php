<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->id();
            $table->string('solution_key')->unique();
            $table->string('title');
            $table->string('badge');
            $table->string('tagline');
            $table->text('desc');
            $table->string('capacity');
            $table->string('battery');
            $table->string('savings');
            $table->string('price');
            $table->json('features')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solutions');
    }
};
