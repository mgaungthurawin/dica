<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompanyProcessingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_processing', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('processing_id')->unsigned();
            $table->foreign('processing_id')
                   ->references('id')->on('processing')
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
        //
    }
}
