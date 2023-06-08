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
        Schema::create('percentage_division', function (Blueprint $table) {
            $table->id();
            $table->decimal('king', 10, 2)->default(0);
            $table->decimal('mayor', 10, 2)->default(0);
            $table->decimal('coridor', 10, 2)->default(0);
            $table->decimal('webapp', 10, 2)->default(0);
            $table->decimal('liaison', 10, 2)->default(0);
            $table->decimal('misc', 10, 2)->default(0);
            $table->decimal('tax', 10, 2)->default(0);
            $table->decimal('pot', 10, 2)->default(0);
            $table->string('location')->nullable();
            $table->date('date_set')->nullable();
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
        Schema::dropIfExists('percentage_division');
    }
};
