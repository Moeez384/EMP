<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Module;
use App\Models\Project_users;
use Illuminate\Http\Request;
use App\Models\User;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users=User::get();
        // $projects=$users->with('projects')->get();
        // dd($users->$projects);
        // dd($users->projects);
        $projects=Project::with('users')->with('modules')->get();
        // dd($projects->first()->users);
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        return View('projects.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->module);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
       $project=Project::create([
        'name'=>$request->name,
        'description'=>$request->description,
        'workCompleted'=>0,
       ]);

       for($i=0;$i<count($request->module)-1;$i++){
        Module::create([
            'project_id'=>$project->id,
            'name'=>$request->module[$i],
        ]);
    }
       
        for ($i=0; $i<count($request->emp_name)-1; $i++){
           $user= User::where('name',$request->emp_name[$i])->first();
           
           Project_users::create([
               'project_id'=>$project->id,
               'user_id'=>$user->id,
           ]);
        }
        return redirect()->route('project.create')->with('success','Project Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index')->with('success','Project Deleted Successfully');
    }
}
