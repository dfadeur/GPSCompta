<?php

namespace GPSCompta;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    /**
     * nom de la table correspondante
     *
     * @var string
     */
    protected $table = 'factures';

    /**
     * relation 'many to one'
     */
    public function client(){
        return $this->belongsTo('GPSCompta\Client');
    }

    /**
     * relation 'one to many'
     */
    public function lignes(){
        return $this->hasMany('GPSCompta\Ligne', 'facture_id', 'id');
    }

    /**
     * liste des champs assignables en masse
     *
     * @var array
     */
    protected $fillable = ['description', 'slug', 'client_id', 'type', 'status'];
}

