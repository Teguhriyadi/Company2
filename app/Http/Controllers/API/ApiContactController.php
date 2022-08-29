<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ApiContactController extends Controller
{
    public function index()
    {
        // $contacts = Contact::all();
        // return response()->json(
        //     [
        //         'contacts' => $contacts,
        //         'message' => 'Contacts',
        //         'code' => 200
        //     ]
        // );
        $contacts = Contact::all();
        if (empty($contacts)) {
            return response()->json([["message" => "Data Kosong"]]);
        } else {
            return response()->json(['message' => 'Success', 'contacts' => $contacts, 'code' => 200]);
        }
    }

}

