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
    }
}
