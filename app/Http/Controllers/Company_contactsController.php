<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company_contact;

class Company_contactsController extends Controller
{
    // Get all by company id for dataTable
    public function getAllByCompanyId(Request $request){
        $companyContacts = Company_contact::select('*')
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
                "id"                => $companyContact->id
            ]);
        endforeach;

        echo json_encode($companyContactsList);
    }

    // Add contact company by company id
    public function addOneByCompanyId(Request $request){
        if($request['firstname'] != NULL && $request['lastname'] != NULL && $request['email'] != NULL && $request['phone'] != NULL && $request['function'] != NULL && $request['company_id'] != NULL && $request['type'] != NULL){
            Company_contact::insert([
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
        else{
            $response['response']   = 'error';
            $response['message']    = 'Champ(s) manquant !';
            echo json_encode($response);
        }
    }

    // Get one by id
    public function getOneById(Request $request){
        $contact = Company_contact::select('*')
                                ->where("id", "=", intval($request["contactid"]))
                                ->get()[0];

        $response['response']   = "success";
        $response['message']    = "Client chargé avec succès !";
        $response['data']       = [
            "contact"   => $contact
        ];
        echo json_encode($response);
    }

    // Update one by id
    public function updateOneById(Request $request){
        Company_contact::where('id', '=', $request['id'])
                ->update([
                    'firstname'       => $request['firstname'],
                    'lastname'        => $request['lastname'],
                    'email'           => $request['email'],
                    'phone'           => $request['phone'],
                    'function'        => $request['function'],
                    'type'            => $request['type'],
                    'updated_at'      => NOW()  
                ]);

        $response['response']   = 'success';
        $response['message']    = 'Contact modifiée avec succès !';
        echo json_encode($response);
    }

    // Delete One by id
    public function deleteOneByid(Request $request){
        Company_contact::where('id', '=', intval($request['contactid']))
                ->delete();

        $response['response']   = 'success';
        $response['message']    = 'Contact supprimé avec succès !';
        echo json_encode($response);
    }
}
