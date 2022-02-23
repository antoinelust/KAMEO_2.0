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
        echo json_encode($entretiens);
        die;
        $bikes = Bike::select('*')
            ->get();

        $listeEntretiens = [];
        $i = 0;

        foreach($entretiens as $entretien):

            array_push($listeEntretiens, [
                "id"    => $entretien->id,
                "idBike"    => $entretien->bike_id,
                "client"    => "client",
                "model"    => "modele",
                            // Bikes_Catalog::where($entretien->bike_id '=', $bikes[$i]->id,)
                            //     ->where('id', '=', $bikes[$i]->bikes_catalog_id)
                            //     ->get('brand')[0]->brand,
                "outDate"    => $entretien->out_date,
                "date"    => $entretien->date,
                "status"    => $entretien->status,
                "address"    => $entretien->address,
            ]);
            $i = $i + 1;
        endforeach;

        echo json_encode($listeEntretiens);
    }
}
