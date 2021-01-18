<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MediaReference extends Model
{
    protected $table = 'media_reference';
    protected $fillable = [
        'media_id', 'reference_id', 'reference_type',
    ];

    public function media()
    {
        return $this->belongsTo('App\Models\Media', 'media_id');
    }
}
