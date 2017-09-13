<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
   {
       Schema::create('contracts', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->bigInteger('student_id')->unsigned();
           $table->bigInteger('job_id')->unsigned();
           $table->timestamps();
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
       Schema::dropIfExists('contracts');
   }
}
