<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKatalogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katalog', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('harga');
            $table->string('kondisi');
            $table->string('gambar');
            $table->string('lokasi');
            $table->string('email');
            $table->string('telpon');
            $table->integer('pemilik_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('katalog');
    }
}
