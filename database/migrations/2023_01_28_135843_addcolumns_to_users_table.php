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
        Schema::table('users', function (Blueprint $table) {
            $table->string('usertype')->nullable();
            $table->string('username')->nullable()->unique();
            $table->string('location')->nullable();
            $table->string('user_image')->nullable();
            $table->string('mobile')->unique();
            $table->string('gcash')->nullable();
            $table->string('maya')->nullable();
            $table->integer('coridor_id')->default(0);
            $table->integer('mayor_id')->default(0);
            $table->integer('king_id')->default(0);
            $table->string('ref_code')->nullable();
            $table->decimal('curr_wallet', 10, 2)->default(0);
            $table->integer('banned')->default(0);
            $table->date('date_banned')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
