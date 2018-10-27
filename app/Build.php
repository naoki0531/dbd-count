<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany('App\UserBuild');
    }

    public function perks()
    {
        return $this->belongsToMany('App\Perk', 'build_perks');
    }
}
