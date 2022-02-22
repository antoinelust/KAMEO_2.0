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
            ->get();

        $entretiensList = [];
        foreach($entretiens as $entretien):
            array_push($entretiensList, [
                "id"    => $entretien->id,
                "idVelo"    => $entretien->bike_id,
                "client"    => "client",
                "modele"    => "modèle",
                "dateSortie"    => $entretien->out_date,
                "date"    => "date",
                "statut"    => $entretien->status,
                "type"    => "type",
                "adresse"    => $entretien->address,
                "tel"    => "tel",
                "email"    => "email",
                "facturation"    => "facturation",
            ]);
        endforeach;

        echo json_encode($entretiensList);
    }
}
