<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    // Get all users
    public function getAll(){
        $users = User::All();

        $response['response']   = 'success';
        $response['message']    = 'Utilisateurs chargée avexc succès';
        $response['data']       = [
            'users' => $users
        ];

        echo json_encode($response);
    }

    // Get all by company id
    public function getAllByCompanyId(Request $request){
        $employes = User::select('*')
                        ->where('companys_id', '=', $request['company_id'])
                        ->get();

        $response['response']   = 'success';
        $response['message']    = 'Employé chargée avexc succès';
        $response['data']       = [
            'employes' => $employes
        ];

        echo json_encode($response);
    }
}
