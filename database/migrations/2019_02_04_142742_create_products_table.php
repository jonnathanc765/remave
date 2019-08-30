<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sub_category_id')->nullable();
            $table->unsignedInteger('post_id');
            $table->string('code');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
             // $table->integer('stock')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('size')->nullable();
            $table->string('size_type')->nullable();
            $table->string('color')->nullable();
            $table->float('price')->nullable();
            $table->unsignedInteger('off')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sub_category_id')
                ->references('id')
                ->on('sub_categories');

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('CASCADE');
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
        Schema::dropIfExists('products');
        Schema::enableForeignKeyConstraints();
    }
}
