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
        Schema::create('game_category', function (Blueprint $table) {
            $table->id();
            $table->string('category_name')->nullable();
            $table->text('choice_array')->nullable();
            $table->integer('win_order')->default(0)->comment('1=na, 2=any order, 3=specific order');
            $table->integer('option_type')->default(0)->comment('1=multiple choice, 2=range of numbers');
            $table->integer('no_of_outcomes')->default(0)->comment('1=multiple choice, 2=range of numbers');
            $table->text('win_array')->nullable();
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
        Schema::dropIfExists('game_category');
    }
};
