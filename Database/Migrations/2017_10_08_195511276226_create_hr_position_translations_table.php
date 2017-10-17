<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHrPositionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr__position_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields
            $table->string('name', 200);
            $table->string('slug', 200);
            $table->text('job_description')->nullable();
            $table->text('qualification')->nullable();

            $table->integer('position_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['position_id', 'locale']);
            $table->foreign('position_id')->references('id')->on('hr__positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hr__position_translations', function (Blueprint $table) {
            $table->dropForeign(['position_id']);
        });
        Schema::dropIfExists('hr__position_translations');
    }
}
