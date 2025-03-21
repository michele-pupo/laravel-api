<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
USE App\Http\Requests\StoreProjectRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $projects = Project::with(['types', 'technologies'])
                        ->orderBy('project_date', 'asc')  // 'asc' per dal più vecchio al più recente
                        ->get();
        
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
{
    $data = $request->validated();
    
    if (isset($data['project_image'])) {
        $path = Storage::put('project_images', $data['project_image']);
        $data['project_image'] = $path;
    }
    
    $data['slug'] = Str::slug($data['name']); // Genera lo slug dal nome
    
    $newProject = Project::create($data);
    
    if (isset($data['types'])) {
        $newProject->types()->attach($data['types']);
    }
    
    if (isset($data['technologies'])) {
        $newProject->technologies()->attach($data['technologies']);
    }
    
    return redirect()->route('admin.projects.show', ['project' => $newProject->slug]);
}

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // dd($project->technologies);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project','types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        
        // Gestione dell'immagine se necessario
        if (isset($data['project_image'])) {
            // Se c'è già un'immagine, la cancello
            if ($project->project_image) {
                Storage::delete($project->project_image);
            }
            $path = Storage::put('project_images', $data['project_image']);
            $data['project_image'] = $path;
        }
        
        $project->update($data);
        
        // Sincronizza le tipologie
        if (isset($data['types'])) {
            $project->types()->sync($data['types']);
        } else {
            $project->types()->detach();
        }
        
        // Sincronizza le tecnologie
        if (isset($data['technologies'])) {
            $project->technologies()->sync($data['technologies']);
        } else {
            $project->technologies()->detach();
        }
        
        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect(route('admin.projects.index'));
    }
}
