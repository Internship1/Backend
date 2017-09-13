<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     //tabel untuk folow-follow'an
     public function up()
   {
   Schema::create('follows', function (Blueprint $table) {
       $table->bigIncrements('id');
       $table->timestamps();
       $table->bigInteger('following_id')->unsigned();
       $table->bigInteger('followable_id')->unsigned();
       $table->foreign('following_id')->references("id")->on('users')->onDelete('cascade');
       $table->foreign('followable_id')->references("id")->on('users')->onDelete('cascade');


   });
 }

 /**
 * Reverse the migrations.
 *
 * @return void
 */
   public function down()
   {
     Schema::dropIfExists('follows');
   }
}
