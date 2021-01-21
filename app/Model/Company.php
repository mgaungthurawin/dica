<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table = 'companies';
    protected $fillable = [
        'category_id', 'name', 'mm_name' ,'abbreviation', 'nation', 'description', 'company_url', 'main_machine_equipment', 'contact', 'company_info', 'production','low_material', 'main_customer', 'cer_standard', 'export_impot', 'office_address', 'office_tel', 'office_fax', 'factory_address', 'factory_tel', 'factory_fax', 'md_ceo_name', 'md_ceo_position', 'factory_manager_name', 'factory_manager_position', 'hygiene_manager_name', 'hygiene_manager_position', 'cp_name', 'cp_position', 'cp_tel', 'cp_email', 'language', 'language_other', 'foundation', 'employee', 'factory_size', 'capital_stock', 'annual_sale', 'production_capacity', 'primary_meterial', 'source_meterial', 'minimum_order', 'customer', 'certificate', 'expotation_country', 'expotation_product', 'expotation_year', 'hygiene', 'machinery','remark', 'type', 'special_note', 'strong_point', 'products', 'processings',
    ];

    public function products() 
    {
    	return $this->belongsToMany("App\Model\Product");
    }

    public function processings() {
    	return $this->belongsToMany("App\Model\Processing");	
    }

    public function locations() {
        return $this->belongsToMany("App\Model\Location");
    }

    public function category() {
        return $this->belongsTo('App\Model\Category' ,'category_id');
    }
}
