<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Processing extends Model
{
	protected $table = 'processing';
    protected $fillable = [
        'prefix', 'main_process', 'location_id', 'recommend', 'sorting', 'product_string'
    ];

    public function location()
    {
        return $this->belongsTo('App\Model\Location', 'location_id');
    }
}
