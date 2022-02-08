<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function retrieveHomeData(){
        $user = DB::table('users')
            ->select('*')
            ->where('id', '=', Auth::user()->id)
            ->get()[0];

            $response['respsonse']  = 'success';
            $response['message']    = 'Données de la home page chargée avec succès !';
            $response['data']       = $user;
            echo json_encode($response);
    }
}
