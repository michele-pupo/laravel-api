<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    //memorizziamo il nuovo contatto nel db
    public function store(){
        
        return response()->json([
            'success' => true,
        ]);
    }
}