<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entretien;
use App\Models\Bike;
use App\Models\Bikes_Catalog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EntretiensController extends Controller
{

    // Get All for dataTable
    public function getAllForDataTable(){
        $entretiens = Entretien::select('*')
            ->where('external_bike', '=', 0)
            ->get();

        $listeEntretiens = [];

        foreach($entretiens as $entretien):

            array_push($listeEntretiens, [
                "id"    => $entretien->id,
                "idBike"    => $entretien->bike_id,
                "client"    => $entretien->bike->company->name,
                "model"    => $entretien->bike->catalog->brand . ' ' . $entretien->bike->catalog->model,
                "outDate"    => $entretien->out_date,
                "date"    => $entretien->date,
                "status"    => $entretien->status,
                "address"    => $entretien->address,
            ]);
        endforeach;

        echo json_encode($listeEntretiens);
    }
}