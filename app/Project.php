<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @method static findOrFail(int $id)
 * @method static find(int $id)
 */
class Project extends Model
{
    protected $table = 'project';
    public $timestamps = false;

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public function setPhotoAttribute($photo)
    {
        $this->attributes['photo'] = json_encode($photo);
        /** @var Photo $file */
        $file = new Photo();
        $file->path = '/public' . json_encode($photo);
        $file->project_id = $this->id;
        $file->title = 'изображение к проекту';
        $file->save();

    }

    public function getPhotoAttribute($photo)
    {
        return json_decode($photo, true);
    }
}
