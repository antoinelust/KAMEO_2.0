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
}
