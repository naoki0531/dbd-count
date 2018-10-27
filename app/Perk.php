<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perk extends Model
{
    public $timestamps = false;

    public function buildPerks()
    {
        return $this->hasMany('App\BuildPerk');
    }
}
