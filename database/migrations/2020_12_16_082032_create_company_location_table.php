<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_location', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('location_id')->unsigned();
            $table->foreign('location_id')
                   ->references('id')->on('location')
                   ->onDelete('cascade');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')
                   ->references('id')->on('companies')
                   ->onDelete('cascade');
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
        Schema::dropIfExists('company_location');
    }
}
