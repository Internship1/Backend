<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsprofileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     //profil yang hanya dimiliki students
     public function up()
     {
         Schema::create('studentsprofile', function (Blueprint $table) {

            $table->bigInteger('user_id')->unsigned();
            $table->binary('CV');
            $table->text('description');
//            $table->integer('qualify_id')->unsigned();
            $table->foreign('user_id')->references("id")->on('users')->onDelete('cascade');
            $table->foreign('qualify_id')->references("id")->on('qualifies')->onDelete('cascade');
            $table->primary('user_id');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('studentsprofile');
     }
}
