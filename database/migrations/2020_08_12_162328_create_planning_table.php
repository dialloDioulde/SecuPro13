<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planning', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('p_employee_id')->unsigned();
            $table->integer('p_location_id')->unsigned();
            $table->date('p_start_date');
            $table->date('p_end_date');
            $table->boolean('p_validated');
            $table->timestamps();
        });

        Schema::table('planning', function ($table){
            $table->foreign('p_employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('p_location_id')->references('id')->on('locations')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIForeign('p_employee_id');
        Schema::dropIForeign('p_location_id');
        Schema::dropIfExists('planning');
    }
}
