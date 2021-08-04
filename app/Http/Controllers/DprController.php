<?php

namespace App\Http\Controllers;

use App\Models\Dpr;
use App\Models\Project;
use App\Models\User;
use App\Models\Module;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DprController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::whereHas(
            'users',
            function ($query) {
                return $query->where('user_id', '1');
            }
        )->with('users')->get();
        dd($projects);
        return view('dpr.index', compact('projects'));
    }

    public function index1()
    {
        $dprs = Dpr::where('date', now()->format('Y-m-d'))->with('modules')->with('projects')->get();
        // $dprs= Dpr::with('modules')->get();
        // dd($dprs);
        return view('dpr.index1', compact('dprs'));
    }

    public function search(Request $request)
    {
        $dprs = Dpr::where('date', Carbon::parse($request->search)->format('Y-m-d'))->with('modules')->with('projects')->get();
        // $dprs= Dpr::with('modules')->get();
        // dd($dprs);
        return view('dpr.index1', compact('dprs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Sname' => 'required|string',
            'module_id' => 'required',
            'detail' => 'required',
            'workCompleted' => 'required',
            'date' => 'required|date',
        ]);

        $dpr = Dpr::create([
            'Sname' => $request->Sname,
            'project_id' => $request->project_id,
            'module_id' => $request->module_id,
            'details' => $request->detail,
            'workCompleted' => $request->workCompleted,
            'date' => Carbon::parse($request->date)->format('Y-m-d'),
        ]);

        return redirect()->route('dpr.add', $request->project_id)->with('success', 'Dpr Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dpr  $dpr
     * @return \Illuminate\Http\Response
     */
    public function show(Dpr $dpr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dpr  $dpr
     * @return \Illuminate\Http\Response
     */
    public function edit(Dpr $dpr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dpr  $dpr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dpr $dpr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dpr  $dpr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dpr $dpr)
    {
        //
    }

    public function add($id)
    {
        $project = Project::where('id', $id)->first();
        $projects = Project::with('modules')->get();
        return view('dpr.create', compact('projects', 'project'));
    }
}
