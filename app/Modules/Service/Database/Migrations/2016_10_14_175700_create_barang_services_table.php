<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pelanggan_id')->unsigned();
            $table->integer('jenis_id')->unsigned();
            $table->string('nama_barang');
            $table->string('kabel_data');
            $table->string('kabel_power');
            $table->string('charger');
            $table->string('kardus');
            $table->string('tas');
            $table->text('kerusakan');
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('pelanggan_id')->references('id')->on('pelanggans')->onDelete('cascade');
           
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_services');
    }
}
