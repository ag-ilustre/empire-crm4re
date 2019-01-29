<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->unsignedInteger('contact_id');
            $table->foreign('contact_id')
                  ->references('id')
                  ->on('contacts')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');

            $table->unsignedInteger('opportunity_stage_id');
            $table->foreign('opportunity_stage_id')
                  ->references('id')
                  ->on('opportunity_stages')
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
        Schema::dropIfExists('opportunities');
    }
}
