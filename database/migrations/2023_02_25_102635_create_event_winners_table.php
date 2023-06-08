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
        Schema::create('event_winners', function (Blueprint $table) {
            $table->id();
            $table->date('win_date');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('event_id')->references('id')->on('events');
            $table->foreignId('bet_id')->references('id')->on('bets');
            $table->string('winning_array')->nullable();
            $table->decimal('winning_amount', 10, 2)->default(0);
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
        Schema::dropIfExists('event_winners');
    }
};
