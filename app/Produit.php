<?php

namespace GPSCompta;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    /**
     * nom de la table correspondante
     *
     * @var string
     */
    protected $table = 'produits';

    /**
     * relation 'one to many'
     */
    public function lignes(){
        return $this->hasMany('GPSCompta\Ligne');
    }

    /**
     * liste des champs assignables en masse
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'buyprice', 'sellprice', 'slug', 'actif', 'product_id', 'facture_id'];
}

