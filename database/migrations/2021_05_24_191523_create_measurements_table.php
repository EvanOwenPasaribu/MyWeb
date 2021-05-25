<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 255);
            $table->date("tanggal");
            $table->time("waktu");
            $table->string('tim', 255);
            $table->string('dayaGardu', 255);
            $table->string('alamat', 255);
            $table->string('indukN', 255);
            $table->string('jurusanA', 255);
            $table->string('jurusanAR', 255);
            $table->string('jurusanAS', 255);
            $table->string('jurusanAT', 255);
            $table->string('jurusanAN', 255);
            $table->string('jurusanB', 255);
            $table->string('jurusanBR', 255);
            $table->string('jurusanBS', 255);
            $table->string('jurusanBT', 255);
            $table->string('jurusanBN', 255);
            $table->string('jurusanC', 255);
            $table->string('jurusanCR', 255);
            $table->string('jurusanCS', 255);
            $table->string('jurusanCT', 255);
            $table->string('jurusanCN', 255);
            $table->string('teganganRS', 255);
            $table->string('teganganRT', 255);
            $table->string('teganganST', 255);
            $table->string('teganganRN', 255);
            $table->string('teganganSN', 255);
            $table->string('teganganTN', 255);
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
        Schema::dropIfExists('measurements');
    }
}
