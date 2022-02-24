<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;


class Service_entretiensController extends Controller
{


    public function selectDescription(Request $request){
        $service_entretiens = Service::select('*')
            ->where("category", "=", $request["category-id"])
            ->get();
    
        $response['data'] = $service_entretiens;
    
        echo json_encode($response);
    }
}
