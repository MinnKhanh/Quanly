<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->bigInteger('id_account')->nullable();
            $table->bigInteger('position');
            $table->bigInteger('department');
            $table->String('cmtnd');
            $table->String('phone');
            $table->String('email');
            $table->integer('gender');
            $table->integer('bank_number');
            $table->string('bank_name');
            $table->date('birth_day');
            $table->string('home_town');
            $table->String('img')->nullable();
            $table->String('status');
            $table->string('description', 255)->nullable();
            $table->date('date_entered');
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
        Schema::dropIfExists('employees');
    }
}
