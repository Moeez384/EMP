<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\Project;
class ModuleController extends Controller
{
    public function create($id){
        $project=Project::where('id',$id)->first();
        return view('module.create',compact('project'));
    }

    public function store(Request $request){
        for($i=0;$i<count($request->module)-1;$i++){
            Module::create([
                'project_id'=>$request->id,
                'name'=>$request->module[$i],
            ]);
        }
        return redirect()->route('project.index')->with('success','Module Added Successfully');
    }
}
