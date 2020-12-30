<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $table = 'news';
    protected $fillable = [
        'category_id', 'title', 'content',
    ];

    public function category()
    {
        return $this->belongsTo('App\Model\Category', 'category_id');
    }
}
