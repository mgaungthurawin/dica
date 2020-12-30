<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Processing extends Model
{
	protected $table = 'processing';
    protected $fillable = [
        'main_process', 'location_id'
    ];

    public function location()
    {
        return $this->belongsTo('App\Model\Location', 'location_id');
    }
}
