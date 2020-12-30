<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MachineEquipment extends Model
{
	protected $table = 'machine_equipment';
    protected $fillable = [
        'machine_type', 'model_designation', 'no_of_machine', 'machine_builder', 'country_origin', 'product_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Model\Product', 'product_id');
    }
}
