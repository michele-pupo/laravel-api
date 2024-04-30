<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    
    public function index(){
        
        // visualizzazione di tutti i projects 
        // $projects = Project::all();

        // paginazione dei projects
        $projects = Project::paginate(3);

        // dd($projects);
        return response()->json([
            "success" => true,
            "result" => $projects
        ]);
    }

}
