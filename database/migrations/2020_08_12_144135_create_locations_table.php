<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('l_client_id')->unsigned()->unique();
            $table->string('l_city', 255);
            $table->text('l_adress');
            $table->string('l_postal code');
            $table->string('l_type');
            $table->string('l_number')->nullable();
            $table->string('e_email')->nullable();
            $table->timestamps();
        });

        Schema::table('locations', function ($table){
            $table->foreign('l_client_id')->references('id')->on('clients')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIForeign('l_client_id');
        Schema::dropIfExists('locations');
    }
}
