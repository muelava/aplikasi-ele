<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubDiskusiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_diskusi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diskusi_id');
            $table->foreignId('guru_id')->nullable();
            $table->foreignId('siswa_id')->nullable()->references('id')->on('siswa')->onDelete('cascade');
            $table->string('komentar');
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
        Schema::dropIfExists('sub_diskusi');
    }
}
