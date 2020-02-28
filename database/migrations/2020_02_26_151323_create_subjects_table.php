<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject_code');
            $table->string('subject_name');
            $table->string('course_type')->comment('THEORY||LAB');
            
            $table->unsignedBigInteger('department_id');
            $table->boolean('isAlloted')->default(0);
            $table->unsignedBigInteger('semester_id');
            $table->timestamps();

            $table->foreign('semester_id')
                ->references('id')->on('semesters')
                ->onDelete('cascade');
            $table->foreign('department_id')
                ->references('id')->on('departments')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
