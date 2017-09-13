<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
       {
           Schema::create('applies', function (Blueprint $table) {
               $table->bigIncrements('id');
               $table->timestamps();
               $table->bigInteger('student_id')->unsigned();
               $table->bigInteger('job_id')->unsigned();

               $table->foreign('student_id')->references("id")->on('users')->onDelete('cascade');
               $table->foreign('job_id')->references("id")->on('jobs')->onDelete('cascade');
           });
       }

       /**
        * Reverse the migrations.
        *
        * @return void
        */
       public function down()
       {
           Schema::dropIfExists('applies');
       }
}
