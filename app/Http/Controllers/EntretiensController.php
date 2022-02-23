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

    public function addEntretien(Request $request){

        DB::table('entretiens')->insert([

            // 'bike_id'           => $request['bike'],
            'bike_id'           => 0,
            'external_bike'     => 0,
            'date'              => $request['date'],
            'address'           => $request['address'],
            'status'            => $request['status'],
            'comment'           => $request['comment'],
            'internal_comment'  => $request['internalComment'],
            'out_date_planned'  => $request['outDate'],
            'number_entretien'  => 0,
            // 'end_date'          => 0,
            // 'out_date'          => 0,
            'client_warned'     => $request['clientWarned'],
            'avoid_billing'     => 0,
            'leasing_to_bill'   => 0,
        ]);

        $response['response']   = 'success';
        $response['message']    = 'Entretien ajouté avec succès !';
        echo json_encode($response);

    }
}