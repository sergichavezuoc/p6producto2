<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('username');
            $table->string('pass');
            $table->string('email');
            $table->string('name');
            $table->string('surname');
            $table->string('telephone', 50);
            $table->string('nif', 50);
            $table->dateTime('date_registered')->useCurrent();

            $table->index(['username', 'email'], 'username');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
