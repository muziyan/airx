<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('fno');
            $table->enum("flight_type",['A320','300ER']);
            $table->string("from_city");
            $table->date('date');
            $table->time("time");
            $table->string("to_city");
            $table->integer("f_tol");
            $table->integer("f_num")->default(0);
            $table->integer("b_tol");
            $table->integer("b_num")->default(0);
            $table->integer("e_tol");
            $table->integer("e_num")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}
