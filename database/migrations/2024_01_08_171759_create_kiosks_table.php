<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kiosks', function (Blueprint $table) {
            $table->bigIncrements('kiosk_ID');
            $table->string('kiosk_name')->nullable();
            $table->string('kiosk_location')->nullable();
            $table->string('kiosk_size')->nullable();
            $table->integer('kiosk_rent')->nullable();
            $table->string('kiosk_status')->nullable();
            $table->string('kiosk_rentDuration')->nullable();
            $table->string('kiosk_img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kiosks');
    }
};