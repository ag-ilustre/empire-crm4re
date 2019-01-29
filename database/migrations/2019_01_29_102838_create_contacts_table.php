<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('contact_number');
            $table->string('email')->unique();
            $table->string('image_path')->default('sample.jpg');
            $table->string('occupation');
            $table->string('company');
            $table->string('address');

            $table->unsignedInteger('opportunity_stage_id');
            $table->foreign('opportunity_stage_id')
                  ->references('id')
                  ->on('opportunity_stages')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');

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
        Schema::dropIfExists('contacts');
    }
}
