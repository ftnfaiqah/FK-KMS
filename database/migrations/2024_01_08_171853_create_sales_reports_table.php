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
        Schema::create('sales_reports', function (Blueprint $table) {
            $table->bigIncrements('sales_ID');
            $table->foreignId('kiosk_ID');
            $table->foreignId('app_ID');
            $table->date('sales_year')->nullable();
            $table->date('sales_month')->nullable();
            $table->float('sales_modal')->nullable();
            $table->float('sales_totalSales')->nullable();
            $table->float('sales_profit')->nullable();
            $table->string('sales_comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_reports');
    }
};
