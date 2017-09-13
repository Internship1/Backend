<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     //tabel untuk kualifikasi(kebisaan) yg akan dibutuhkan pada tabel jobs dan studentsprofile
     public function up()
     {
         Schema::create('qualifies', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->boolean('status');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('qualifies');
     }
}
