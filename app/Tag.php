<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed title
 * @method static findOrFail(int $id)
 */
class Tag extends Model
{
    protected $table = 'tag';
    public $timestamps = false;

}
