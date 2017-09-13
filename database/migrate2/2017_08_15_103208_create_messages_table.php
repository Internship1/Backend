<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
      {
          Schema::create('messages', function (Blueprint $table) {
              $table->bigIncrements('id');
              $table->bigInteger('sender_id')->unsigned();
              $table->bigInteger('receiver_id')->unsigned();
              $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
              //$table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
              $table->text('message_text')->nullable();
              $table->binary('message_attachment')->nullable();

             $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');

          });
      }

      /**
       * Reverse the migrations.
       *
       * @return void
       */
      public function down()
      {
          Schema::dropIfExists('messages');
      }
}
