<?php

namespace GPSCompta;

use Illuminate\Database\Eloquent\Model;
use GPSCompta\Produit;
use GPSCompta\Facture;


class Ligne extends Model
{
    /**
     * nom de la table correspondante
     *
     * @var string
     */
    protected $table = 'lignes';

    /**
     * relation 'many to one'
     */
    public function facture(){
        return $this->belongsTo('GPSCompta\Facture');
    }

    /**
     * relation 'many to one'
     */
    public function produit(){
        return $this->belongsTo('GPSCompta\Produit');
    }

    /**
     * liste des champs assignables en masse
     *
     * @var array
     */
    protected $fillable = ['quantity', 'slug', 'facture_id', 'produit_id'];
}
