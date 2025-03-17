<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    
    public function index(Request $request) {
    if ($request->query('all')) {
        // Restituisce tutti i progetti senza paginazione
        $projects = Project::with(['type', 'technologies'])->get();
    } else {
        // Pagina 2 progetti per volta (default)
        $projects = Project::with(['type', 'technologies'])->paginate(2);
    }

    return response()->json([
        "success" => true,
        "result" => $projects
    ]);
}

    public function show($slug){

        // per trovare il project senza eager loading
        // $project = Project::find($id);

        $project = Project::with(['type','technologies'])->where('slug', '=', $slug)->first();

        // dd($project);

        if($project){
            return response()->json([
                "success" => true,
                "result"=> $project
            ]);
        } else {
            return response()->json([
                "success" => false,
                "error" => "Project not found"
            ]);
        }
        
    }
}
