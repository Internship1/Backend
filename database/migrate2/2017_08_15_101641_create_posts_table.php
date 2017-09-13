<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
      {
          Schema::create('posts', function (Blueprint $table) {
              $table->bigIncrements('id');
              $table->bigInteger('user_id')->unsigned();
              $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
              $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
              $table->text('post_text')->nullable();
              $table->binary('post_picture')->nullable();
              $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          });
      }

      /**
       * Reverse the migrations.
       *
       * @return void
       */
      public function down()
      {
          Schema::dropIfExists('posts');
      }
}
