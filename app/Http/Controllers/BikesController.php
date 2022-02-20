<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Bike;
use App\Models\Bikes_Catalog;

class BikesController extends Controller
{
    // Get all for bikes dataTable
    public function getAllForDataTable(Request $request){
        $companyBikes = Bike::select('*')
                                ->where("companies_id", "=", intval($request["companies_id"]))
                                ->get();

        $companyBikesList = [];
        foreach($companyBikes as $companyBike):
            array_push($companyBikesList, [
                "frame_reference"   => $companyBike->frame_reference,
                "client_name"       => $companyBike->client_name,
                "contract_start"    => $companyBike->contract_start,
                "contract_end"      => $companyBike->contract_end,
                "btn"               => '<button type="button" class="btn btn-xs modify"><i class="fa fa-pencil-alt"> </i></button>
                                        <button type="button" class="btn btn-xs btn-danger delete"><i class="icon-x"> </i></button>'
            ]);
        endforeach;

        echo json_encode($companyBikesList);
    }

    // Get all bikes
    public function getAll(){
        $bikes = Bike::all();

        $response['response']   = 'success';
        $response['message']    = 'Vélos récupéré avec succès !';
        $response['data']       = [
            "bikes"     => $bikes
        ];
        echo json_encode($response);
    }

    // Get all bike brands
    public function getAllBrand(){
        $bikes      = Bike::distinct()->get('bikes_catalog_id');
        $brandsNotDistinct = [];
        for($i = 0; $i < count($bikes); $i++){
            array_push($brandsNotDistinct, Bikes_Catalog::distinct()
                                                            ->where('id', '=', $bikes[$i]->bikes_catalog_id)
                                                            ->get(['brand'])[0]->brand);
        }
        $brandDistinct = [];
        foreach(array_unique($brandsNotDistinct) as $brand):
            array_push($brandDistinct, $brand);
        endforeach;

        $response['response']   = 'success';
        $response['message']    = 'Marques récupéré avec succès';
        $response['data']       = [
            "brands"    => $brandDistinct
        ];
        echo json_encode($response);
    }

    // Get all model by brand
    public function getAllModelByBrand(Request $request){
        $bikes      = Bike::distinct()->get('bikes_catalog_id');
        $modelsNotDistinct = [];
        for($i = 0; $i < count($bikes); $i++){
            array_push($modelsNotDistinct, Bikes_Catalog::where('brand', '=', $request['brand'])
                                                ->get(['model'])[$i]->model);
        }
        $modelDistinct = [];
        foreach(array_unique($modelsNotDistinct) as $model):
            array_push($modelDistinct, $model);
        endforeach;

        $response['response']   = 'success';
        $response['message']    = 'Modèles récupéré avec succès';
        $response['data']       = [
            "models"    => $modelDistinct
        ];
        echo json_encode($response);
    }

    // Get all size by model
    public function getAllSizeByModel(Request $request){
        $bikes      = Bike::distinct()->get('bikes_catalog_id');
        $sizesNotDistinct = [];
        for($i = 0; $i < count($bikes); $i++){
            array_push($sizesNotDistinct, Bikes_Catalog::distinct()
                                                ->where('model', '=', $request['model'])
                                                ->get(['sizes'])[0]->sizes);
        }
        $sizeDistinct = [];
        foreach(array_unique($sizesNotDistinct) as $size):
            array_push($sizeDistinct, $size);
        endforeach;

        $response['response']   = 'success';
        $response['message']    = 'Modèles récupéré avec succès';
        $response['data']       = [
            "sizes"    => $sizeDistinct
        ];
        echo json_encode($response);
    }
}
