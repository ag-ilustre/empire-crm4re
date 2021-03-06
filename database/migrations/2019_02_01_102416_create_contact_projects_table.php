<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_projects', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('contact_id');
            $table->foreign('contact_id')
            ->references('id')
            ->on('contacts')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->unsignedInteger('project_id');
            $table->foreign('project_id')
            ->references('id')
            ->on('projects')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->text('property_description');            
            $table->unsignedInteger('property_status_id');
            $table->foreign('property_status_id')
            ->references('id')
            ->on('property_statuses')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->decimal('total_contract_price', 13,4);
            $table->decimal('estimated_commission', 13,4);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_projects');
    }
}
