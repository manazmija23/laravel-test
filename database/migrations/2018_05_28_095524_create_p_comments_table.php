<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('name');
            $table->text('body');
            $table->tinyInteger('approved')->default('0');
            $table->integer('product_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('p_comments', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_comments');
        Schema::table('p_comments', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });
    }
}
