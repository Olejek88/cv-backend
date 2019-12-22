<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    public $timestamps = false;

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /*    public function photos()
        {
            return $this->hasMany('App\Photo');
        }*/

    public function setPhotosAttribute($photos)
    {
        $this->attributes['photos'] = json_encode($photos);
    }

    public function getPhotosAttribute($photos)
    {
        return json_decode($photos, true);
    }
}
