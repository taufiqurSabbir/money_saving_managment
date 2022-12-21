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
        Schema::create('transations', function (Blueprint $table) {
            $table->id();

            $table->string('amount');
            $table->string('type');
            $table->foreignId('month_id')->constrained('months');
            $table->foreignId('year_id')->constrained('years');
            $table->unsignedBigInteger('collect_by');
            $table->foreign('collect_by')->references('id')->on('users');
            $table->date('paid_date');
            $table->foreignId('user_id')->constrained();
            $table->string('status')->comment('paid,Due')->default('Due');
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
        Schema::dropIfExists('transations');
    }
};
