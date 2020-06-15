<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed title
 * @method static findOrFail(int $id)
 */
class Category extends Model
{
    protected $table = 'category';
    public $timestamps = false;

}
