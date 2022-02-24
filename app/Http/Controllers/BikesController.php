<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
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
                "contract_type"     => $companyBike->contract_type
            ]);
        endforeach;

        echo json_encode($companyBikesList);
    }

    // Get all for bikes client dataTable
    public function getAllBikesClientForDataTable(){
        $bikes = Bike::all();

        $bikesList = [];
        foreach($bikes as $bike):
            array_push($bikesList, [
                "id"                => $bike->id,
                "company"           => $bike->company->name,
                "brand"             => $bike->catalog->brand,
                "model"             => $bike->catalog->model,
                "contract_start"    => $bike->contract_start,
                "contract_end"      => $bike->contract_end,
                "contract_type"     => $bike->contract_type,
                "leasing_price"     => $bike->leasing_price,
                "usable"            => $bike->usable,
                "insurance"         => $bike->insurance,
            ]);
        endforeach;

        echo json_encode($bikesList);
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

    // Get all bikes by company id
    public function getAllByCompanyId(Request $request){
        $bikeid = Bike::select('*')
            ->where("companies_id", "=", $request["company_id"])
            ->get();

        $response['data'] = $bikeid;

        echo json_encode($response);
    }

    // Get all bike brands
    public function getAllBrand(){
        $brands = Bikes_Catalog::select('brand')
                    ->distinct()
                    ->get();

        $response['response']   = 'success';
        $response['message']    = 'Marques récupéré avec succès';
        $response['data']       = [
            "brands"    => $brands
        ];
        echo json_encode($response);
    }

    // Get all model by brand
    public function getAllModelByBrand(Request $request){
        $models      = Bikes_Catalog::select('id', 'model')
                            ->where('brand', '=', $request['brand'])
                            ->distinct()
                            ->get();

        $response['response']   = 'success';
        $response['message']    = 'Modèles récupéré avec succès';
        $response['data']       = [
            "models"    => $models
        ];
        echo json_encode($response);
    }

    // Get all size by model
    public function getAllSizeByModel(Request $request){
        $sizes = Bikes_Catalog::select('sizes')
                            ->where('id', '=', $request['id'])
                            ->get();

        $response['response']   = 'success';
        $response['message']    = 'Tailles récupéré avec succès';
        $response['data']       = [
            "sizes"    => $sizes
        ];
        echo json_encode($response);
    }

    // Add one 
    public function addOne(Request $request){
        if($request['brand'] != NULL){
            if($request['model'] != NULL){
                if($request['bike_buying_date'] != NULL){
                    if($request['estimated_delivery_date'] != NULL){
                        if($request['price'] != NULL){
                            if($request['type'] == 'partage'){
                                Bike::insert([
                                    "bike_price"                => $request['price'],
                                    "client_name"               => $request['brand'] . '-' . $request['model'],
                                    "size"                      => $request['size'],
                                    "color"                     => $request['color'],
                                    "contract_type"             => "order",
                                    "bike_buying_date"          => $request['bike_buying_date'],
                                    "estimated_delivery_date"   => $request['estimated_delivery_date'],
                                    "bikes_catalog_id"          => $request['bikes_catalog_id'],
                                    "companies_id"              => $request['companies_id'],
                                ]);
                                
                                $response['response']   = 'success';
                                $response['message']    = 'Vélo ajouté avec succès';
                                echo json_encode($response);
                            }
                            else{
                                $bike_id =  Bike::insertGetId([
                                                "bike_price"                => $request['price'],
                                                "client_name"               => $request['brand'] . '-' . $request['model'],
                                                "size"                      => $request['size'],
                                                "color"                     => $request['color'],
                                                "contract_type"             => "order",
                                                "bike_buying_date"          => $request['bike_buying_date'],
                                                "estimated_delivery_date"   => $request['estimated_delivery_date'],
                                                "bikes_catalog_id"          => $request['bikes_catalog_id'],
                                                "companies_id"              => $request['companies_id'],
                                            ]);
    
                                DB::table('customers_bikes_access')
                                        ->insert([
                                            "type"      => $request['type'],
                                            "users_id"  => $request["employe"],
                                            "bikes_id"  => $bike_id
                                        ]);
                                
                                $response['response']   = 'success';
                                $response['message']    = 'Vélo ajouté avec succès';
                                echo json_encode($response);
                            }        
                        }else{
                            $response['response']   = 'error';
                            $response['message']    = 'Veuillez ajouter un prix';
                            echo json_encode($response);
                        }
                    }
                    else{
                        $response['response']   = 'error';
                        $response['message']    = 'Veuillez ajouter une date d\'estimation de livraison';
                        echo json_encode($response);
                    }
                }
                else{
                    $response['response']   = 'error';
                    $response['message']    = 'Veuillez ajouter une date d\'achat';
                    echo json_encode($response);
                }
            }
            else{
                $response['response']   = 'error';
                $response['message']    = 'Veuillez ajouter un modèle';
                echo json_encode($response);
            }
        }
        else{
            $response['response']   = 'error';
            $response['message']    = 'Veuillez ajouter une marque';
            echo json_encode($response);
        }
    }

    // Retrieve bke img
    public function retrieveBikeImg(Request $request){
        if(file_exists('storage/bikes/' . $request['id'])){
            if(file_exists('storage/bikes/' . $request['id'] . '/principal.png')){

                $response['response']   = 'success';
                $response['message']    = 'Photo chargée avec succès';
                $response['data']       = [
                    "img"   => 'bikes/' . $request['id'] . '/principal.png'
                ];
                echo json_encode($response);
            }
            else if(file_exists('storage/bikes/' . $request['id'] . '/principal.jpg')){
                $response['response']   = 'success';
                $response['message']    = 'Photo chargée avec succès';
                $response['data']       = [
                    "img"   => 'bikes/' . $request['id'] . '/principal.jpg'
                ];
                echo json_encode($response);
            }
            else if(file_exists('storage/bikes/' . $request['id'] . '/principal.jpeg')){
                $response['response']   = 'success';
                $response['message']    = 'Photo chargée avec succès';
                $response['data']       = [
                    "img"   => 'bikes/' . $request['id'] . '/principal.jpeg'
                ];
                echo json_encode($response);
            }
            else{
                $response['response']   = 'success';
                $response['message']    = 'Photo chargée avec succès 2';
                $response['data']       = [
                    "img"   => "bikes/default.jpg"
                ];
                echo json_encode($response);
            }
        }
        else{
            $response['response']   = 'success';
                $response['message']    = 'Photo chargée avec succès 1';
                $response['data']       = [
                    "img"   => "bikes/default.jpg"
                ];
                echo json_encode($response);
        }
    }
}
