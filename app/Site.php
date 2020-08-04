<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = ['gestionnaire','latitude','longitude','description','libelle','ville','commune','typesite','zone','situation','priorite','code_site','proprietaire_pylone',"localisation",'longitude_dms','latitude_dd',
        'zone_description','gestionnaire_description','quartier'];

    public function typesite()
    {
        return $this->belongsTo('App\Type');
    }

    public function proprietaire_pylone()
    {
        return $this->belongsTo('App\Zone');
    }
}
