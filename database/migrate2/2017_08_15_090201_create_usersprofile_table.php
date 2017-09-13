<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersprofileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     //profil umum user dengan role student dan employer
     public function up()
     {
         Schema::create('usersprofile', function (Blueprint $table) {
            //$table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('address');
            $table->string('contact');
            $table->tinyInteger('status')->default(1);
            $table->decimal('rate', 5, 2)->default(null);
            $table->timestamps();
            $table->foreign('user_id')->references("id")->on('users')->onDelete('cascade');
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
         Schema::dropIfExists('usersprofile');
     }
}
