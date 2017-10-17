<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHrPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr__positions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            // Your fields
            $table->string('reference_no', 20);
            $table->tinyInteger('personal_number')->default(1);
            $table->text('criteria')->nullable();
            $table->text('position')->nullable();
            $table->dateTime('start_at')->default(\Carbon\Carbon::now()->hour(0)->minute(0));
            $table->dateTime('end_at')->default(\Carbon\Carbon::tomorrow()->hour(0)->minute(0));
            $table->tinyInteger('status')->default(1);
            $table->smallInteger('ordering')->default(1);

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
        Schema::dropIfExists('hr__positions');
    }
}
