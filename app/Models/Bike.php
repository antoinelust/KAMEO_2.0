<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    use HasFactory;

    public function catalog(){
        return $this->belongsTo('App\Models\Bikes_catalog', 'bikes_catalog_id', 'id');
    }
    public function entretien(){
        return $this->hasMany('App\Models\Entretien', 'id', 'bike_id');
    }
    public function company(){
        return $this->belongsTo('App\Models\Companie', 'companies_id', 'id');
    }
}