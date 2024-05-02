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
        // $projects = Project::paginate(3);

        // visualizzazione di tutti i projects con le tipologie e le tecnologie collegate
        $projects = Project::with(['type','technologies'])->paginate(3);

        // dd($projects);
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
