<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'category';
    protected $fillable = ['prefix', 'title', 'description', 'media_id'];

    public function media()
    {
    	return $this->belongsTo('App\Model\Media');
    }
}
