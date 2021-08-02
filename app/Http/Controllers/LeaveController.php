<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Leave;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves=Leave::orderBy('satus','asc')->get();
        return view('Leave.index',compact('leaves'));
        // dd(\Carbon\Carbon::now()->diffInDays(auth()->user()->created_at->endOfMonth(), false));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Leave.create');
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
            'reason'=> 'required',
            'days'=> 'required|numeric',
        ]);
        $save = new Leave;
        $save->name=$request->name;
        $save->satus=$request->status;
        $save->reason=$request->reason;
        $save->days=$request->days;
        $save->empid=$request->empid;
        $save->save();

        $details=[
            'title' => 'Application For Leave',
            'body' => $request->reason, 
        ];
        Mail::to("moeezahmed448@gmail.com")->send(new TestMail($details));
        return redirect()->route('leave.create')->with('success','You Have Successfuly Applied for the leave');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }

    public function applied($empid){
        
        $leaves=DB::table('leaves')->where('empid',$empid)->orderBy('id','desc')->get();
        return view('Leave.show',compact('leaves'));
    }

    public function status($sta,$id){
        DB::table('leaves')->where('id',$id)->update(['satus'=>$sta]);
        return redirect()->route('leave.index')->with('Sucess','Status for the Application has Been succesfully Changed');
    }
}
