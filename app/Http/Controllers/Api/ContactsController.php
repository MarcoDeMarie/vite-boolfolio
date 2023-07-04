<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Contacts;
use App\Mail\NewContact;

class ContactsController extends Controller
{
    public function sendMail(Request $request){


        $data = $request->all();

        $validator = Validator::make( $data,
            [
                'name' => 'required|min:2|max:255',
                'email' => 'required|email|max:255',
                'message' => 'required|min:10',
            ],
            [
                'name.required' => 'Il nome è un campo obbligatorio',
                'name.min' => 'Il nome deve contenere almeno :min caratteri',
                'name.max' => 'Il nome non può avre piò di :max caratteri',
                'email.required' => 'La mail è un campo obbligatorio',
                'email.email' => 'Indirizzo email non corretto',
                'email.max' => 'La mail non può avre più di :max caratteri',
                'message.required' => 'Il messaggio è un campo obbligatorio',
                'message.min' => 'Il messaggio deve contenere almeno :min caratteri',
            ]
        );

        if($validator->fails()){
            $success = false;
            $errors = $validator->errors();
            return response()->json(compact('success','errors'));
        }


        $new_contacts = new Contacts();
        $new_contacts->fill($data);
        $new_contacts->save();


        Mail::to('de.marie.marco@hotmail.it')->send(new NewContact($new_contacts));
        $success = true;
        return response()->json(compact('success'));
    }
}
