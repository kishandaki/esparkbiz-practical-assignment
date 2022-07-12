<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_forms', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('mobile_no')->nullable();
            $table->date('date_of_birth')->default(NULL);
            $table->integer('gender');
            $table->text('address1');
            $table->text('address2');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->integer('zip_code');
            $table->float('notice_period');
            $table->float('expected_CTC')->nullable();
            $table->float('current_CTC')->nullable();
            $table->string('department');
            $table->enum('relationship_status', array('single', 'married', 'widowed', 'divorced'))
                ->comment('relationship status single, married, widowed, divorced')
                ->nullable();
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
        Schema::dropIfExists('application_forms');
    }
}
