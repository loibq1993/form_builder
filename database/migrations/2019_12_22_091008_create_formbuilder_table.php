<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormbuilderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formbuilder_table', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 100)->nullable(false);
            $table->timestamp('start_date')->nullable(false);
            $table->timestamp('end_date')->nullable();
            $table->tinyInteger('status')->nullable(false);
            $table->text('description')->nullable();
            $table->text('form_builder')->nullable(false);
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
        Schema::dropIfExists('formbuilder_table');
    }
}
