<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->unique();
            $table->string('name');
            $table->string('description');
            $table->string('logo')->nullable();
            $table->string('minimum_ammount')->nullable();
            $table->unsignedInteger('zone_id');
            $table->string('address');
            $table->string('phone')->unique();
            $table->string('access_token')->nullable()->unique();
            $table->string('public_key')->nullable()->unique();
            $table->integer('pay_user_id')->nullable()->unique();
            $table->string('refresh_token')->nullable()->unique();
            $table->softDeletes();
            $table->timestamps();

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
        Schema::dropIfExists('shops');
    }
}
