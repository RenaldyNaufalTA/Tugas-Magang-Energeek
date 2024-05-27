<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelamar', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255);
            $table->string('telpon', 30);
            $table->string('alamat', 255);
            $table->string('email', 255);
            $table->foreignId('lowongan_id')->references('id')->on('lowongan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('jabatan_id')->references('id')->on('jabatan')
                ->onUpdate('cascade')
                ->onDelete('cascade'); //id jabatan
            $table->string('created_by', 50)->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelamar');
    }
}
