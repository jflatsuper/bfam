<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('CourseTable', function (Blueprint $table) {
            $table->id();
            $table->string('CourseTitle');
            $table->string('Description');
            $table->string('Comments');
            $table->string('videolinks');
            
            $table->string('CourseCreator');
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
        //
        Schema::dropIfExists('CourseTable');
    }
}
