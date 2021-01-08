<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $table = 'news';
    protected $fillable = [
        'category_id', 'title', 'content', 'media_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Model\Category', 'category_id');
    }

    public function media()
    {
    	return $this->belongsTo('App\Model\Media');
    }
}
