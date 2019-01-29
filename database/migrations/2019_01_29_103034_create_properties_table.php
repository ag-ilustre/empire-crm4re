<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street_address');
            $table->string('unit');
            $table->string('city');
            $table->string('province');
            $table->integer('postal_code');
            $table->decimal('estimated_price', 10,2);
            $table->decimal('percent_commission', 10,2);
            $table->decimal('estimated_commission', 10,2);
            $table->text('description');

            $table->unsignedInteger('property_type_id');
            $table->foreign('property_type_id')
                  ->references('id')
                  ->on('property_types')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');

            $table->unsignedInteger('contact_id');
            $table->foreign('contact_id')
                  ->references('id')
                  ->on('contacts')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');

            $table->unsignedInteger('transaction_type_id');
            $table->foreign('transaction_type_id')
                  ->references('id')
                  ->on('transaction_types')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');

            $table->unsignedInteger('deal_status_id');
            $table->foreign('deal_status_id')
                  ->references('id')
                  ->on('deal_statuses')
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
        Schema::dropIfExists('properties');
    }
}
