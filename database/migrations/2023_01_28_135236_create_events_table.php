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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('king_id')->references('id')->on('users');
            $table->string('event_name')->nullable();
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->string('event_description')->nullable();
            $table->string('event_image')->nullable();
            $table->decimal('initial_pot', 10, 2)->default(0);
            $table->decimal('slot_price', 10, 2)->default(0);
            $table->text('choice_array')->nullable();
            $table->integer('win_order')->default(0)->comment('1=na, 2=any order, 3=specific order');
            $table->integer('option_type')->default(0)->comment('1=multiple choice, 2=range of numbers');
            $table->integer('no_of_outcomes')->default(0);
            $table->text('win_array')->nullable();
            $table->decimal('running_balance', 10, 2)->default(0);
            $table->integer('win_flag')->default(0);
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
        Schema::dropIfExists('events');
    }
};
