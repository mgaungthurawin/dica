<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    	protected $table = 'foods';
        protected $fillable = [
            'category_id', 'name', 'mm_name' ,'abbreviation', 'nation', 'description', 'url', 'office_address', 'office_tel', 'office_fex', 'factory_address', 'factory_tel', 'factory_fax', 'md_ceo_name', 'md_ceo_position', 'factory_manager_name', 'factory_manager_position', 'hygiene_manager_name', 'hygiene_manager_position', 'language', 'language_other', 'foundation', 'employee', 'factory_size', 'capital_stock', 'annual_sale', 'production_capacity', 'primary_meterial', 'source_meterial', 'minimum_order', 'customer', 'certificate', 'expotation_country', 'expotation_product', 'expotation_year', 'hygiene', 'machinery', 'remark', 'type',
        ];
}
