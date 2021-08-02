<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;


class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::all();
        foreach($users as $user){
            if(Carbon::now()->format('m, y') > Carbon::parse($user->checkDate)->format('m-y')){
                Salary::insert([
                    'empid'=>$user->empid,
                    'name'=>$user->name,
                    'fname'=>$user->fname,
                    'position'=>$user->position,
                    'salary'=>$user->salary,
                    'status'=>0,
                ]);
                User::where('id',$user->id)->update([
                    'checkDate'=>now()->format('Y-m-d'),
                ]);
            }
        }
        $salaries=Salary::all();
        return view('salaries.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary $salary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary $salary)
    {
        dd($request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary)
    {
        //
    }

    public function recieved(Request $request){
        Salary::where('id',$request->id)->update([
            'status'=>1,
        ]);
        $salary=Salary::where('id',$request->id)->first();
        return View ('salaries.slip',compact('salary'));
    }

    public function record(){
        $salaries=Salary::
          where(DB::raw('YEAR(updated_at)'),'=',date('Y'))
        ->where(DB::raw('MONTH(updated_at)'),'=',date('m'))
        ->paginate(10);
        return view('salaries.index1',compact('salaries'));
    }

    public function search(Request $request){
        $year = Carbon::parse($request->search)->format('Y');
        $month = Carbon::parse($request->search)->format('m');
                
        $salaries=Salary::
              where(DB::raw('YEAR(updated_at)'),'=',$year)
            ->where(DB::raw('MONTH(updated_at)'),'=',$month)
        ->paginate();
        return view('salaries.index1',compact('salaries'));
    }
}