<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content')->nullable();
            $table->integer('likes')->nullable();

            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('film_id')->unsigned()->nullable();
            $table->integer('parent_id')->unsigned()->nullable();

            $table->foreign('user_id')->references('id')->on('admin_users');
            $table->foreign('film_id')->references('id')->on('films');
            $table->foreign('parent_id')->references('id')->on('comments');
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
        Schema::dropIfExists('comments');
    }
}
