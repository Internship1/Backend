<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentQualifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('studentqualify', function (Blueprint $table) {
           $table->bigInteger('student_id')->unsigned();
           $table->integer('qualify_id')->unsigned();

           $table->foreign('student_id')->references("student_id")->on('studentsprofile')->onDelete('cascade');
           $table->foreign('qualify_id')->references("id")->on('qualifies')->onDelete('cascade');
           $table->primary(array('student_id','qualify_id'));
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('studentqualify');
     }
}
