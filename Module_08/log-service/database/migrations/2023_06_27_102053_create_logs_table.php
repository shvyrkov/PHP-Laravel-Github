<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('time'); // time — время события
            $table->integer('duration'); // duration — длительность
            $table->string('ip', 100)->nullable(); // IP-адрес зашедшего пользователя
            $table->string('url')->nullable(); // url — адрес, который запросил пользователь
            $table->string('method', 10)->nullable(); // method — HTTP-метод (GET, POST)
            $table->string('input')->nullable(); // input — передаваемые параметры
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
