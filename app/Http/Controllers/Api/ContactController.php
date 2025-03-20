<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Valida i dati ricevuti
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|email',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Prepara i dati per l'email
        $data = [
            'name' => $request->name,
            'address' => $request->address,
            'message' => $request->message
        ];

        try {
            // Invia l'email
            Mail::to('fabiomichelepupo@gmail.com')->send(new ContactMail($data));

            return response()->json([
                'success' => true,
                'message' => 'Messaggio inviato con successo'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Errore nell\'invio dell\'email: ' . $e->getMessage()
            ], 500);
        }
    }
}