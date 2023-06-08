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
        Schema::create('bets', function (Blueprint $table) {
            $table->id();
            $table->date('bet_date')->nullable();
            $table->foreignId('event_id')->references('id')->on('events');
            $table->foreignId('user_id')->default(0)->references('id')->on('users');
            $table->decimal('slot_price', 10, 2)->default(0);
            $table->integer('bet_slots')->default(0);
            $table->string('bet_location')->nullable();
            $table->string('bet_choice')->nullable();
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
        Schema::dropIfExists('bets');
    }
};
