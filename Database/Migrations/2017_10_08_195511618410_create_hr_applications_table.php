<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHrApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr__applications', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            // Your fields
            $table->string('first_name');
            $table->string('last_name');
            $table->tinyInteger('gender')->nullable();
            $table->tinyInteger('nationality')->nullable();
            $table->string('marital')->nullable();
            $table->string('health')->nullable();
            $table->string('criminal')->nullable();
            $table->text('request')->nullable();
            $table->text('identity')->nullable();
            $table->text('driving')->nullable();
            $table->text('contact')->nullable();
            $table->text('skills')->nullable();
            $table->text('education')->nullable();
            $table->text('language')->nullable();
            $table->text('reference')->nullable();
            $table->text('experience')->nullable();
            $table->text('course')->nullable();
            $table->string('emergency')->nullable();
            $table->text('size')->nullable();

            $table->integer('position_id')->unsigned()->nullable();
            $table->foreign('position_id')->references('id')->on('hr__positions')->onDelete('SET NULL');

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
        Schema::dropIfExists('hr__applications');
    }
}
