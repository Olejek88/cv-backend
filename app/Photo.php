<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string path
 * @property mixed project_id
 * @property string title
 * @method static findOrFail(int $id)
 */
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
