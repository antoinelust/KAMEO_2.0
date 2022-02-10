<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{

    // Load data for display companies data table
    public function getAllForDataTable(){
        $companies = DB::table('companies')
            ->select('*')
            ->get();

        $companiesList = [];
        foreach($companies as $company):
            array_push($companiesList, [
                "name"      => '<a data-companyid="' . $company->id . '" href="#" class="modify-company">' . $company->name . '</a>',
                "type"      => $company->type,
                "status"    => $company->status,
            ]);
        endforeach;

        echo json_encode($companiesList);
    }

    // Get all info of a company by company id
    public function getAllByCompanyId(Request $request){
        $company = DB::table('companies')
            ->select('*')
            ->where('id', '=', intval($request['company_id']))
            ->get()[0];

        $response['response']   = 'success';
        $response['message']   = 'Donnée de la compagnie ' . $company->id . ' chargée avec succès !';
        $response['data']       = [
            'company' => $company
        ];

        echo json_encode($response);
    }

    // Update company by company id
    public function updateById(Request $request){
        DB::table('companies')
              ->where('id', '=', $request['id'])
              ->update([
                  'name'            => $request['name'],
                  'vat_number'      => $request['vat_number'],
                  'street'          => $request['street'],
                  'city'            => $request['city'],
                  'zip'             => $request['zip'],
                  'billing_group'   => $request['billing_group'],
                  'type'            => $request['type'],
                  'aquisition'      => $request['aquisition'],
                  'audience'        => $request['audience'],
                  'status'          => $request['status'],
                  'updated_at'      => NOW()  
                ]);

        $response['response']   = 'success';
        $response['message']    = 'Informations modifiée avec succès !';
        echo json_encode($response);
    }

    // Upload and update logo
    public static function uploadLogoByCompanyId(Request $request){
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('file')) {

            $imagePath  = $request->file('file');
            $type       = $imagePath->getMimeType();


            if($imagePath->getMimeType() == "image/png" || $imagePath->getMimeType() == "image/jpg" || $imagePath->getMimeType() == "image/gif" || $imagePath->getMimeType() == "image/svg"){
                $ext        = substr($type, -3);
                $imageName  = $request->companyId . '.' . $ext;
            }
            else if($imagePath->getMimeType() == "image/jpeg"){
                $ext        = substr($type, -4);
                $imageName  = $request->companyId . '.' . $ext;
            }
            else{
                $response['response']   = 'error';
                $response['message']    = 'Format non pris en charge';
                echo json_encode($response);
            }

            $request->file('file')->storeAs('/public/companies_logo', $imageName);

            DB::table('companies')
                ->where('id', intval($request->companyId))
                ->update([
                    'logo'          => $imageName,
                    'updated_at'    => NOW()
                ]);

            $response['response']   = 'success';
            $response['message']    = 'Logo mise à jour avec succès !';
            $response['data']       = $imageName;
            echo json_encode($response);
        }
    }
}
