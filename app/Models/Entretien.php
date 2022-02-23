<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entretien extends Model
{
    use HasFactory;

    public function bike(){
        return $this->belongsTo('App\Models\Bike', 'bike_id', 'id');
    }
}