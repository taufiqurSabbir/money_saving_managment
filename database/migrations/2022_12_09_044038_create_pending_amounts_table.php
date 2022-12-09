<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_amounts', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->foreignId('month_id')->constrained('months');
            $table->foreignId('year_id')->constrained('years');
            $table->foreignId('paid_by')->constrained('users');
            $table->string('amount_send_number');
            $table->string('gateway');
            $table->date('paid_date');
            $table->string('status')->default('pending')->comment('approve,pending,rejected');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pending_amounts');
    }
};
