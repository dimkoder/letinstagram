<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hashtags', function (Blueprint $table) {
            $table->id();
			$table->string('name')->unique();

			# Здесь не указано поле со временем timestamps, поэтому в файле модели "Hashtag" нужно добавить переменную
			# public $timestamps = false;
			# Иначе, будет вылетать ошибка, что такого поля нет
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hashtags');
    }
};
