<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entretien;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EntretiensController extends Controller
{

    // Get All for dataTable
    public function getAllForDataTable(){
        $entretiens = Entretien::select('*')
            ->where('external_bike', '=', 0)
            ->get();

        $entretiensList = [];
        foreach($entretiens as $entretien):
            array_push($entretiensList, [
                "id"    => $entretien->id,
                "idBike"    => $entretien->bike_id,
                "client"    => "client",
                "model"    => "modèle",
                "outDate"    => $entretien->out_date,
                "date"    => $entretien->date,
                "status"    => $entretien->status,
                "address"    => $entretien->address,
            ]);
        endforeach;

        echo json_encode($entretiensList);
    }

    public function addEntretien(Request $request){

    }
}
