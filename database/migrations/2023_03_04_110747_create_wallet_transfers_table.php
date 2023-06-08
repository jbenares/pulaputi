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
        Schema::create('wallet_transfers', function (Blueprint $table) {
            $table->id();
            $table->datetime('transaction_date')->default(date("Y-m-d H:i:s"));
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('ref_code');
            $table->decimal('transfer_amount', 10, 2)->default(0);
            $table->text('remarks')->nullable();
            $table->string('payment_references');
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
        Schema::dropIfExists('wallet_transfers');
    }
};
