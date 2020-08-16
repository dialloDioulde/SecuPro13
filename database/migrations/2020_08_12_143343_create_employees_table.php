<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('e_card_id')->unique();
            $table->string('e_last_name');
            $table->string('e_first_name');
            $table->date('e_birthday_date');
            $table->string('e_city_of_birth');
            $table->string('e_number');
            $table->string('e_email')->unique();
            $table->string('e_city');
            $table->string('e_adress');
            $table->string('e_postal_code');
            $table->string('e_status',20);
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
