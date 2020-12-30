<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	protected $table = 'location';
    protected $fillable = ['parent', 'name'];

    public function companies() 
    {
        return $this->belongsToMany("App\Model\Company");
    }
}
