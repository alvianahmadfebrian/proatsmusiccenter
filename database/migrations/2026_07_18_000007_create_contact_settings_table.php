<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_settings', function (Blueprint $table) {
            $table->id();
            $table->text('address_representative');
            $table->text('address_workshop');
            $table->string('email');
            $table->string('whatsapp');
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->text('map_iframe_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_settings');
    }
};
