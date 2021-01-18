<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Processing extends Model
{
	protected $table = 'processing';
    protected $fillable = [
        'prefix', 'main_process', 'location_id', 'recommend', 'main_classification', 'sorting'
    ];

    public function location()
    {
        return $this->belongsTo('App\Model\Location', 'location_id');
    }
}
