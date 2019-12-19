<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $table = 'photos';
    public $timestamps = false;

    public function setPhotosAttribute($photos)
    {
        if (is_array($photos)) {
            $this->attributes['photos'] = json_encode($photos);
        }
    }

    public function getPhotosAttribute($photos)
    {
        return json_decode($photos, true);
    }
}
