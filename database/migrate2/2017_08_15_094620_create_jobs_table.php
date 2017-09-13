<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     //tabel pekerjaan milik employer
     public function up()
     {
         Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('employer_id')->unsigned();
            $table->integer('job_type');
            $table->integer('job_status')->default(1);
            $table->string('job_description');
            $table->text('job_facilities');
            $table->text('job_position');
            $table->integer('qualify_id')->unsigned();
            $table->timestamps();
            $table->foreign('qualify_id')->references('id')->on('qualifies')->onDelete('cascade');
            $table->foreign('employer_id')->references('id')->on('users')->onDelete('cascade');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('jobs');
     }
}
