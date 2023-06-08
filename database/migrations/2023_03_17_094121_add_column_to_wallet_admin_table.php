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
        Schema::table('wallet_admin', function (Blueprint $table) {
            $table->string('cashin_method')->nullable()->after('transfer_id');
            $table->string('source')->nullable()->after('cashin_method');
            $table->text('remarks')->nullable()->after('transaction_reference');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wallet_admin', function (Blueprint $table) {
            //
        });
    }
};
