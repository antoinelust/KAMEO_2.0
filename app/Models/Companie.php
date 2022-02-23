<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companie extends Model
{
    use HasFactory;

    public function bike(){
        return $this->hasMany('App\Models\Bike', 'id', 'companies_id');
    }
}