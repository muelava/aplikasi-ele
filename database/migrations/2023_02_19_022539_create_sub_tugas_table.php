<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_tugas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tugas_id')->nullable()->references('id')->on('tugas')->onDelete('cascade');
            $table->foreignId('siswa_id')->nullable()->references('id')->on('siswa')->onDelete('cascade');
            $table->string('tugas');
            $table->string('dok_tugas');
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
        Schema::dropIfExists('sub_tugas');
    }
}
