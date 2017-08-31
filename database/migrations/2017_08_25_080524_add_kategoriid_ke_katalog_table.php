<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKategoriidKeKatalogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('katalog', function(Blueprint $table){
            $table->integer('kategori_id')->unsigned();
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('katalog', function(Blueprint $table){
            $table->dropForeign('katalog_kategori_id_foreign');
        });
    }
}
