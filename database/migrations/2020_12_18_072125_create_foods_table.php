<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('name')->nullable();
            $table->string('mm_name')->nullable();
            $table->string('abbreviation')->nullable();
            $table->string('nation')->nullable();
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->string('office_address')->nullable();
            $table->string('office_tel')->nullable();
            $table->string('office_fex')->nullable();
            $table->string('factory_address')->nullable();
            $table->string('factory_tel')->nullable();
            $table->string('factory_fax')->nullable();
            $table->string('md_ceo_name')->nullable();
            $table->string('md_ceo_position')->nullable();
            $table->string('factory_manager_name')->nullable();
            $table->string('factory_manager_position')->nullable();
            $table->string('hygiene_manager_name')->nullable();
            $table->string('hygiene_manager_position')->nullable();
            $table->string('cp_name')->nullable();
            $table->string('cp_position')->nullable();
            $table->string('cp_tel')->nullable();
            $table->string('cp_email')->nullable();
            $table->string('language')->nullable();
            $table->string('language_other')->nullable();
            $table->string('foundation')->nullable();
            $table->string('employee')->nullable();
            $table->string('factory_size')->nullable();
            $table->string('capital_stock')->nullable();
            $table->string('annual_sale')->nullable();
            $table->string('production_capacity')->nullable();
            $table->string('primary_meterial')->nullable();
            $table->string('source_meterial')->nullable();
            $table->string('minimum_order')->nullable();
            $table->longText('customer')->nullable();
            $table->longText('certificate')->nullable();
            $table->string('expotation_country')->nullable();
            $table->string('expotation_product')->nullable();
            $table->string('expotation_year')->nullable();
            $table->longText('hygiene')->nullable();
            $table->longText('machinery')->nullable();
            $table->longText('remark')->nullable();
            $table->string('type');
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
        Schema::dropIfExists('foods');
    }
}
