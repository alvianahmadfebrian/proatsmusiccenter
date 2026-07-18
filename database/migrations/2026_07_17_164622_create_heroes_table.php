<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('heroes', function (Blueprint $table) {

            $table->id();

            $table->string('subtitle');
            $table->string('tagline');
            $table->string('title');

            $table->text('description');

            $table->string('button1');
            $table->string('button2');

            $table->string('image')->nullable();

            $table->string('stat1');
            $table->string('stat2');
            $table->string('stat3');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
