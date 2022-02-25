<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entretien;
use Illuminate\Support\Facades\DB;

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
                "id"        => $entretien->id,
                "idBike"    => $entretien->bike_id,
                "client"    => $entretien->bike->company->name,
                "model"     => $entretien->bike->catalog->brand . ' ' . $entretien->bike->catalog->model,
                "outDate"   => $entretien->out_date,
                "date"      => $entretien->date,
                "status"    => $entretien->status,
                "address"   => $entretien->address,
            ]);
        endforeach;

        echo json_encode($listeEntretiens);
    }

    public function getAllById(Request $request){
        $entretiens = Entretien::select('*')
            ->where('id', '=', intval($request['entretien_id']))
            ->get()[0];
        
        $response['response']   = 'success';
        $response['message']    = 'Donnée de l\'entretien ' . $entretiens->id . 'chargée avec succès !';
        $response['data']       = [
            'entretien' => $entretiens
        ];

        echo json_encode($response);
    }

    public function addEntretien(Request $request){

        $id_entretien = DB::table('entretiens')->insertGetId([

            'bike_id'           => $request['bike'],
            'external_bike'     => 0,
            'date'              => $request['date'],
            'address'           => $request['address'],
            'status'            => $request['status'],
            'comment'           => $request['comment'],
            'internal_comment'  => $request['internalComment'],
            'out_date_planned'  => $request['outDate'],
            'number_entretien'  => 0,
            'client_warned'     => $request['clientWarned'],
            'avoid_billing'     => 0,
            'leasing_to_bill'   => 0,
        ]);

        foreach($request['otherTable'] as $otherAccessory):

            DB::table('entretien_details')->insert([

                'item_type'         => "otherAccessory",
                'item_id'           => 0,
                'duration'          => 0,
                'amount'            => $otherAccessory[0],
                'description'       => $otherAccessory[1],
                'entretiens_id'     => $id_entretien,
            ]);
        endforeach;

        $response['response']   = 'success';
        $response['message']    = 'Entretien ajouté avec succès !';
        echo json_encode($response);

    }
}
