<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail($id)
 */
class Cv extends Model
{
    protected $table = 'cv';
    public $timestamps = false;
}
