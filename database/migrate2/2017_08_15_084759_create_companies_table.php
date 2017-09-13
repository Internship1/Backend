<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     //company dari user dengan role employer
     public function up()
     {
         Schema::create('companies', function (Blueprint $table) {
            //$table->increments('id');
            $table->bigInteger('employer_id')->unsigned();
            $table->string('company_name');
            $table->string('company_contact');
            $table->string('company_address');
            $table->binary('company_picture');
            $table->timestamps();
            $table->foreign('employer_id')->references("id")->on('users')->onDelete('cascade');
            $table->primary('employer_id');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('companies');
     }
}
