<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{

    // Load data for display contact companies data table
    public function getAllForCompaniesDataTable(){
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

    // Load data for display bike companies data table
    public function getAllForBikesCompanyDataTable(Request $request){
        $companyBikes = DB::table('bikes')
                                ->select('*')
                                ->where("companies_id", "=", intval($request["companies_id"]))
                                ->get();

        $companyBikesList = [];
        foreach($companyBikes as $companyBike):
            array_push($companyBikesList, [
                "frame_reference"   => $companyBike->frame_reference,
                "client_name"       => $companyBike->client_name,
                "contract_start"    => $companyBike->contract_start,
                "contract_end"      => $companyBike->contract_end,
                "btn"               => '<button class="modify button small green button-3d rounded icon-right glyphicon glyphicon-pencil" type="button">
                                        </button><button class="delete button small red button-3d rounded icon-right glyphicon glyphicon-remove" type="button"></button>'
            ]);
        endforeach;

        echo json_encode($companyBikesList);
    }

    // Load data for display contacts company table
    public function getAllForContactsCompanyDataTable(Request $request){
        $companyContacts = DB::table('companies_contact')
                                ->select('*')
                                ->where("companies_id", "=", intval($request["companies_id"]))
                                ->get();

        $companyContactsList = [];
        foreach($companyContacts as $companyContact):
            array_push($companyContactsList, [
                "firstname"         => $companyContact->firstname,
                "lastname"          => $companyContact->lastname,
                "email"             => $companyContact->email,
                "phone"             => $companyContact->phone,
                "function"          => $companyContact->function,
                "type"              => $companyContact->type,
                "btn"               => '<button class="modify button small green button-3d rounded icon-right glyphicon glyphicon-pencil" type="button">
                                        </button><button class="delete button small red button-3d rounded icon-right glyphicon glyphicon-remove" type="button"></button>'
            ]);
        endforeach;

        echo json_encode($companyContactsList);
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

    // Add company and compagnies_contact if audience is company
    public function addOne(Request $request){
        if($request['audience'] == "B2B" || $request['audience'] == "INDEPENDANT"){

            $company_id = DB::table('companies')->insertGetId([
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

            DB::table('companies_contact')->insert([
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
            $company_id = DB::table('companies')->insertGetId([
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

            DB::table('companies_contact')->insert([
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

    // Add contact company by company id
    public function addContactCompanyByCompanyId(Request $request){
        
        DB::table('companies_contact')->insert([
            'lastname'          => $request['firstname'],
            'firstname'         => $request['lastname'],
            'email'             => $request['email'],
            'phone'             => $request['phone'],
            'function'          => $request['function'],
            'companies_id'      => $request['company_id'],
            'type'              => $request['type'],
            'created_at'        => NOW()         
        ]);

        $response['response']   = 'success';
        $response['message']    = 'Contact ajouté avec succès !';
        echo json_encode($response);
    }
}