<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('loves', function (Blueprint $table) {
             $table->bigIncrements('id');
             $table->bigInteger('user_id')->unsigned();
             $table->bigInteger('post_id')->unsigned();
             $table->timestamp('date_started')->useCurrent = true;

             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

         });

     }

     public function down()
     {
         Schema::dropIfExists('loves');
     }
}
