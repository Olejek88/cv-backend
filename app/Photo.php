<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photo';
    public $timestamps = false;

    public function setPhotoAttribute($photos)
    {
        if (is_array($photos)) {
            $this->attributes['path'] = json_encode($photos);
        }
    }

    public function getPhotoAttribute($photos)
    {
        return json_decode($photos, true);
    }

}
