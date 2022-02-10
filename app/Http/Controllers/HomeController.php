<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // Retrieve necassary datas for the home page
    public function retrieveHomeData(){
        $user = DB::table('users')
            ->select('*')
            ->where('id', '=', Auth::User()->id)
            ->get()[0];
        $company = DB::table('companies')
            ->select('*')
            ->where('id', '=', Auth::User()->companys_id)
            ->get()[0];
        $nbCompanies = DB::table('companies')
            ->select('*')
            ->get();

        $response['response']  = 'success';
        $response['message']    = 'Données de la home page chargée avec succès !';
        $response['data']       = [
            'user'          => $user,
            'company'       => $company,
            'nbCompanies'   => $nbCompanies->count()
        ];
        echo json_encode($response);
    }
    
}
