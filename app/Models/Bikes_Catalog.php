<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bikes_Catalog extends Model
{
    use HasFactory;
    public $table = "bikes_catalogs";

    public function bike(){
        return $this->hasMany('App\Models\Bike', 'id', 'bikes_catalog_id');
    }
}
