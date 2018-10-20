<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutlettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outletters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_surat');
            $table->string('klasifikasi');
            $table->string('asal');
            $table->string('perihal');
            $table->string('tujuan');
            $table->string('detail_surat');
            $table->string('petugas');
            $table->string('filename');
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
        Schema::dropIfExists('outletters');
    }
}
