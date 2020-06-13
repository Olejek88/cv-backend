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

    /*    public function photos()
        {
            return $this->hasMany('App\Photo');
        }*/

    public function setPhotosAttribute($photos)
    {
        $this->attributes['photos'] = json_encode($photos);
        /** @var Photo $file */
        $file = new Photo();
        $file->path = '/public' . json_encode($photos);
        $file->project_id = $this->id;
        $file->title = 'изображение к проекту';
        $file->save();

    }

    public function getPhotosAttribute($photos)
    {
        return json_decode($photos, true);
    }
}
