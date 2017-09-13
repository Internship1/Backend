<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
       {
           Schema::create('feedbacks', function (Blueprint $table) {
               $table->bigInteger('contract_id')->unsigned();
               $table->timestamps();
               $table->integer('rate');
               $table->text('review');

               $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
               $table->primary('contract_id');
           });
       }

       /**
        * Reverse the migrations.
        *
        * @return void
        */
       public function down()
       {
           Schema::dropIfExists('feedbacks');
       }
}
