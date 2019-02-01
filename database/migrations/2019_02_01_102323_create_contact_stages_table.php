<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_stages', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('contact_id');
            $table->foreign('contact_id')
            ->references('id')
            ->on('contacts')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->unsignedInteger('stage_id');
            $table->foreign('stage_id')
            ->references('id')
            ->on('stages')
            ->onDelete('restrict')
            ->onUpdate('cascade');
            
            $table->string('title');
            $table->text('note');
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
        Schema::dropIfExists('contact_stages');
    }
}
