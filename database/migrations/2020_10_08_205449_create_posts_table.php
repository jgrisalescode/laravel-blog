<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            // PK
            $table->id();
            // FK of users in posts
            $table->bigInteger('user_id')->unsigned();
            // Fields of the table
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->text('body');
            // Iframe to embed code
            $table->text('iframe')->nullable();
            $table->timestamps();
            // Seting the relation with users table
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
