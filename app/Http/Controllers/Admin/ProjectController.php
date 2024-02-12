<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types =Type::all();
        return view('create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        
        $data = $request->validated();

        $project = new Project();
        
        $project -> fill($data);

        $project->slug = Str::of($data['title'])->slug('-');

        if (isset($data['post_image'])){
        $project->post_image = Storage::put('uploads',$data('post_image'));
        }

        $project->save();

        return redirect()->route('show');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('show',$project->id,compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        
        $data = $request->validated();
        $project ->update($data);
        $project->slug = Str::of($data['title'])->slug('-');
        return redirect()->route('show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('welcome');
    }
}
