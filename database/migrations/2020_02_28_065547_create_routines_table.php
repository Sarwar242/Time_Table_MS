<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routines', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('day_id');
            $table->unsignedBigInteger('period_id');
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('teacher_id');
            $table->timestamps();



            $table->foreign('day_id')
                ->references('id')->on('days')
                ->onDelete('cascade');

            $table->foreign('period_id')
                ->references('id')->on('periods')
                ->onDelete('cascade');
             $table->foreign('semester_id')
                ->references('id')->on('semesters')
                ->onDelete('cascade');
            
            $table->foreign('teacher_id')
                ->references('id')->on('teachers')
                ->onDelete('cascade');
             $table->foreign('subject_id')
                ->references('id')->on('subjects')
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
        Schema::dropIfExists('routines');
    }
}
