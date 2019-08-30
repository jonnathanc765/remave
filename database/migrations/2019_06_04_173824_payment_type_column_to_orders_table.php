<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaymentTypeColumnToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->enum('payment_type', ['MERCADOPAGO', 'VENDEDOR', 'BANESCO', 'PROVINCIAL', 'VENEZUELA'])->default('MERCADOPAGO');
            $table->boolean('shipped');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('payment_type');
            $table->dropColumn('shipped');
        });
    }
}
