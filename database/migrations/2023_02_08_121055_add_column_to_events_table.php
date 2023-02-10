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
        Schema::table('events', function (Blueprint $table) {
            $table->integer('game_category_id')->default(0)->rename();
            $table->dropColumn('choice_array');
            $table->dropColumn('win_order');
            $table->dropColumn('option_type');
            $table->dropColumn('no_of_outcomes');
            $table->dropColumn('win_array');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->text('choice_array')->nullable();
            $table->integer('win_order')->default(0)->comment('1=na, 2=any order, 3=specific order');
            $table->integer('option_type')->default(0)->comment('1=multiple choice, 2=range of numbers');
            $table->integer('no_of_outcomes')->default(0);
            $table->text('win_array')->nullable();
           
        });
    }
};
