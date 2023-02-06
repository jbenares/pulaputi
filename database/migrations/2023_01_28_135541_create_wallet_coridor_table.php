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
        Schema::create('wallet_coridor', function (Blueprint $table) {
            $table->id();
            $table->date('date_earned')->nullable();
            $table->foreignId('coridor_id')->references('id')->on('users');
            $table->foreignId('event_id')->references('id')->on('events');
            $table->string('transaction_type')->nullable();
            $table->decimal('debit', 10, 2)->default(0);
            $table->decimal('credit', 10, 2)->default(0);
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
        Schema::dropIfExists('wallet_coridor');
    }
};
