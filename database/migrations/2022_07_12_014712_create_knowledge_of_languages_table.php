<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnowledgeOfLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knowledge_of_languages', function (Blueprint $table) {
            $table->id();
            $table->integer('form_id');
            $table->string('lang_name');
            $table->tinyInteger('is_read')->default(0);
            $table->tinyInteger('is_write')->default(0);
            $table->tinyInteger('is_speak')->default(0);
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
        Schema::dropIfExists('knowledge_of_languages');
    }
}
