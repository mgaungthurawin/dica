<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'products';
    protected $fillable = [
        'prefix', 'name', 'category_id', 'media_id','recommend','parent', 'main_product',
    ];

    public function media()
    {
    	return $this->belongsTo('App\Model\Media');
    }
    
    public function category()
    {
        return $this->belongsTo('App\Model\Category', 'category_id');
    }

    public function companies() 
    {
        return $this->belongsToMany("App\Model\Company");

    }
    public function location()
    {
        return $this->belongsTo('App\Model\Location', 'location_id');
    }
}
