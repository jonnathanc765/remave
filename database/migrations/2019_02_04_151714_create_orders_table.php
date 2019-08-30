<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('code');
            $table->string('state_id');
            $table->string('city_id');
            $table->string('zone_id');
            $table->string('zip_code');
            $table->string('street');
            $table->string('address');
            $table->string('bank_reference');
            $table->string('name_bank');
            $table->enum('status', ['pending', 'failed', 'successful']);
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('orders');
        Schema::enableForeignKeyConstraints();
    }
}
