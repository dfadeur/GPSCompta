<?php

namespace GPSCompta;

use Illuminate\Database\Eloquent\Model;
use GPSCompta\Facture;

class Client extends Model
{
    /**
     * nom de la table correspondante
     *
     * @var string
     */
    protected $table = 'clients';

    /**
     * relation 'one to many'
     */
    public function factures(){
        return $this->hasMany('GPSCompta\Facture', 'client_id', 'id');
    }

    /**
     * liste des champs assignables en masse
     *
     * @var array
     */
    protected $fillable = ['name', 'secondname', 'zip', 'slug', 'city', 'adress', 'mobile', 'phone', 'mail', 'client', 'supplier', 'tva'];
}

