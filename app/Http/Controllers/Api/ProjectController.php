<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    
    public function index(Request $request) {
        if ($request->query('all')) {
            $projects = Project::with(['types', 'technologies'])->get();
        } else {
            $projects = Project::with(['types', 'technologies'])->paginate(2);
        }
        
        return response()->json([
            "success" => true,
            "result" => $projects
        ]);
    }
    
    public function show($slug){
        $project = Project::with(['types','technologies'])->where('slug', '=', $slug)->first();
        
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
