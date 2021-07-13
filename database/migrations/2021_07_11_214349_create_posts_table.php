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
            $table->id();
            $table->string('title') ;
            $table->string('slug')->unique()    ;
            $table->text('description') ;
            $table->text('meta_description');
            $table->text('meta_keywords')   ;


            $table->unsignedBigInteger('user_id')   ;
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')  ;


            $table->unsignedBigInteger('categore_id')   ;
            $table->foreign('categore_id')->references('id')->on('categores')->onDelete('cascade')  ;


            $table->unsignedBigInteger('photo_id')   ;
            $table->foreign('photo_id')->references('id')->on('photo')->onDelete('cascade')  ;


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
        Schema::dropIfExists('posts');
    }
}
