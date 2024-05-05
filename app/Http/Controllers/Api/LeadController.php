<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    //memorizziamo il nuovo contatto nel db
    public function store(Request $request){

        //validazione
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required|email',
            'message' => 'required'
        ], [
            'name.required' => "Devi inserire il tuo nome",
            'address.required' => "Devi inserire la tua email",
            'address.email' => "Devi inserire una mail corretta",
            'message.required' => "Devi inserire un messaggio",
        ]);

        //validazione non va a buon fine
        if($validator->fails()) {
            // messaggio di errore
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
            
        }

        //salvataggio del db
        $newLead = new Lead();
        $newLead->fill($request->all());
        $newLead->save();

        //invio mail
        Mail::to('mikypupo@hotmail.it')->send(new NewContact($newLead));

        // Risposta al client
        return response()->json([
            'success' => true,
            'message' => 'Richiesta di contatto inviato correttamente',
            'request' => $request->all(),
        ]);
    }
}