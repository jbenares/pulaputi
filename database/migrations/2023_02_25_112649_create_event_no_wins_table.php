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
        Schema::create('event_no_wins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->references('id')->on('events');
            $table->foreignId('king_id')->references('id')->on('users');
            $table->decimal('amount', 10, 2)->default(0);
            $table->decimal('transferred_amount', 10, 2)->default(0);
            $table->decimal('balance', 10, 2)->default(0);
            $table->integer('transferred_to')->default(0);
            $table->date('transfer_date')->nullable();
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
        Schema::dropIfExists('event_no_wins');
    }
};
