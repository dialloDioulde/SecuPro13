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
            $table->string('e_birthday_date');
            $table->string('e_city of birth');
            $table->string('e_number');
            $table->string('e_email')->unique();
            $table->string('c_city');
            $table->string('c_adress');
            $table->string('postal code');
            $table->boolean('e_available');
            $table->string('e_status',20);
            $table->string('e_image')->nullable();
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
