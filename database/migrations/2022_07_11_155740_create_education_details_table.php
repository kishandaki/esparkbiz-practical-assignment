<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_details', function (Blueprint $table) {
            $table->id();
            $table->integer('form_id');
            $table->string('type')->comment('SSC Or HSC/Diploma Result, Bachelor or Master Degree');
            $table->string('name_of_board')->comment('Name Of Board Or Course Name')->nullable();
            $table->string('course_name')->comment('Name Of Course Name')->nullable();
            $table->double('pass_out_year')->default(0000)->comment('pass out year in years');
            $table->string('percentage')->default(0000)->comment('Percentage (%)');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_details');
    }
}
