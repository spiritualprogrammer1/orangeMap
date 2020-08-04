<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = ['libelle'];

    public function site()
    {
        return $this->hasMany('App\Site');
    }
}
