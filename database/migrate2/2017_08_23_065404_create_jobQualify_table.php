<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobQualifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('jobsqualify', function (Blueprint $table) {
           $table->bigInteger('job_id')->unsigned();
           $table->integer('qualify_id')->unsigned();

           $table->foreign('job_id')->references("id")->on('jobs')->onDelete('cascade');
           $table->foreign('qualify_id')->references("id")->on('qualifies')->onDelete('cascade');
           $table->primary(array('job_id','qualify_id'));
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('jobsqualify');
     }
}
