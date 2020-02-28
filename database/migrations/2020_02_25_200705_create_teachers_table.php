<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('faculty_number');
            $table->String('name');
            $table->String('alias');
            $table->String('designation');
            $table->String('phone');
            $table->String('email');
            $table->String('password')->default('$2y$10$QbMD9a1bl32n.0s7cYP1JurukXi1zFUdDWcfUZOSSfCqEwvaGa5Yy');
            //pass:000
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
        Schema::dropIfExists('teachers');
    }
}
