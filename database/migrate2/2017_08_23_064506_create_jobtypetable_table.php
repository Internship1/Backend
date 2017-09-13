<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobtypetableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('jobtypetable', function (Blueprint $table) {
            //$table->increments('id');
            $table->bigInteger('job_id')->unsigned();
            $table->integer('jobType_id')->unsigned();

            $table->foreign('job_id')->references("id")->on('jobs')->onDelete('cascade');
            $table->foreign('jobType_id')->references("id")->on('jobtypes')->onDelete('cascade');
            $table->primary(array('job_id','jobType_id'));
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('jobtypetable');
     }
}
