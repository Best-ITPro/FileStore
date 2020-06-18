<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilestoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filestores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('FileName');
            $table->string('FileSize');
            $table->string('FileMemType');
            $table->string('FileLink');
            $table->string('FileEmail');
            $table->text('FileMessage');
            $table->char('FileActive', 1);
            $table->string('FileSenderIP');
            $table->string('FileSenderInfo');
            $table->date('FileDateErase');
            $table->integer('FileDownloads');
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
        Schema::dropIfExists('filestores');
    }
}
