<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            $table->integer('id_class', true);
            $table->integer('id_teacher');
            $table->integer('id_course');
            $table->integer('id_schedule');
            $table->string('name');
            $table->string('color', 10);

            $table->unique(['id_teacher', 'id_course', 'id_schedule'], 'id_teacher');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class');
    }
}
