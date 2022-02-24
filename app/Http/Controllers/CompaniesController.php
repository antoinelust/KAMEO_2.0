<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{

    // Get All for dataTable
    public function getAllForDataTable(){
        $companies = Companie::select('*')
            ->get();

        $companiesList = [];
        foreach($companies as $company):
            array_push($companiesList, [
                "name"      => array($company->id,$company->name),
                "type"      => $company->type,
                "status"    => $company->status,
            ]);
        endforeach;

        echo json_encode($companiesList);
    }

    // Get All company names and ids
    public function getAllCompanyNames(){
        $companies = Companie::select('*')
            ->get();

        $companiesList = [];
        foreach($companies as $company):
            array_push($companiesList, [
                "name"      => $company->name,
                "id"      => $company->id,
            ]);
        endforeach;

        echo json_encode($companiesList);
    }

    // Get all
    public function getAll(){
        $companies = Companie::All();

        $response['response']   = 'success';
        $response['message']    = 'Compagnies chargée avec succès';
        $response['data']       = [
            'companies' => $companies
        ];
    }

    // Get all info for the company by id
    public function getAllById(Request $request){
        $company = Companie::select('*')
            ->where('id', '=', intval($request['company_id']))
            ->get()[0];

        $response['response']   = 'success';
        $response['message']    = 'Donnée de la compagnie ' . $company->id . ' chargée avec succès !';
        $response['data']       = [
            'company' => $company
        ];

        echo json_encode($response);
    }

    // Update company by id
    public function updateByOnById(Request $request){
        Companie::where('id', '=', $request['id'])
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
    public function uploadLogoByCompanyId(Request $request){
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

            Companie::where('id', intval($request->companyId))
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

    // Add company and compagnies_contact if audience is company
    public function addOne(Request $request){
        if($request['audience'] == "B2B" || $request['audience'] == "INDEPENDANT"){

            $company_id = Companie::insertGetId([
                'name'              => $request['name'],
                'billing_group'     => 1,
                'street'            => $request['street'],
                'zip'               => $request['zip'],
                'city'              => $request['city'],
                'vat_number'        => $request['vat_number'],
                'type'              => $request['type'],
                'aquisition'        => $request['aquisition'],
                'audience'          => $request['audience'],
                'status'            => "actif",
                'created_at'        => NOW()
            ]);

            DB::table('company_contacts')->insert([
                'lastname'          => $request['contact_firstname'],
                'firstname'         => $request['contact_lastname'],
                'email'             => $request['contact_email'],
                'phone'             => $request['contact_phone'],
                'function'          => $request['contact_function'],
                'companies_id'      => $company_id,
                'created_at'        => NOW()
            ]);

            $response['response']   = 'success';
            $response['message']    = 'Client ajouté avec succès !';
            echo json_encode($response);
        }
        else if($request['audience'] == "B2C"){
            $company_id = Companie::insertGetId([
                'name'              => $request['name'],
                'billing_group'     => 1,
                'street'            => $request['street'],
                'zip'               => $request['zip'],
                'city'              => $request['city'],
                'type'              => $request['type'],
                'aquisition'        => $request['aquisition'],
                'audience'          => $request['audience'],
                'status'            => "actif",
                'created_at'        => NOW()
            ]);

            DB::table('company_contacts')->insert([
                'lastname'          => $request['firstname'],
                'firstname'         => $request['lastname'],
                'email'             => $request['email'],
                'phone'             => $request['phone'],
                'function'          => "",
                'companies_id'      => $company_id,
                'created_at'        => NOW()
            ]);

            $response['response']   = 'success';
            $response['message']    = 'Client ajouté avec succès !';
            echo json_encode($response);
        }
    }
}
