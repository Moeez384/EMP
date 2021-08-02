<?php
namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(now()->format('Y-m-d'));
        $attendance=Attendance::
        where('date','=',now()->format('Y,m,d'))
        ->paginate(10);
        return View('attendance.index',compact('attendance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(now());
        $user=User::all();
       foreach($user as $user){
        //   dd(now());
        //   dd(Carbon::parse($user->attendanceDate));
        //   dd(now() > Carbon::parse($user->attendanceDate));
           if(now()->format('Y-m-d') > Carbon::parse($user->attendanceDate)->format('Y-m-d')){
               Attendance::insert([
                'name'=>$user->name,
                'empid'=>$user->empid,
                'position'=>$user->position,
                'date'=>now()->format('Y-m-d'),
                'status'=>'3',
               ]);
               User::where('id',$user->id)->update([
                    'attendanceDate'=>date('Y-m-d')
               ]);
           }
       }

       $attendance=Attendance::all();
       return view('attendance.index1',compact('attendance'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }

    public function mark($id,$sta){
       Attendance::where('id',$id)->update([
            'status'=>$sta,
       ]);
        return redirect()->route('Attendance.create')->with('success','Attendance Has Been Marked');
    }

    public function record(){
        $users=User::paginate(10);
        return view('attendance.index2',compact('users'));
    }

    public function individualRecord($empid){
        // $post = Attendance::whereYear('date', '=', date('Y'))
        //       ->whereMonth('date', '=', date('m'))
        //       ->count();

        //       echo $post;
        //       die();

        $record=Attendance::where(
            'empid', '=',$empid)
            ->where(DB::raw('YEAR(date)'),'=',date('Y'))
            ->where(DB::raw('MONTH(date)'),'=',date('m'))
            ->where('status','1')
        ->count();
        $record1=Attendance::where(
            'empid', '=',$empid)
            ->where(DB::raw('YEAR(date)'),'=',date('Y'))
            ->where(DB::raw('MONTH(date)'),'=',date('m'))
            ->where('status','0')
        ->count();
        $record2=Attendance::where(
            'empid', '=',$empid)
            ->where(DB::raw('YEAR(date)'),'=',date('Y'))
            ->where(DB::raw('MONTH(date)'),'=',date('m'))
            ->where('status','2')
        ->count();
            $user=User::where('empid',$empid)->first();
        return view('attendance.index3',compact('record','record1','record2','user'));
    }

    public function search(Request $request){ 
        $attendance=Attendance::
        where('date','=',$request->search)
        ->paginate(10);
        return View('attendance.index',compact('attendance'));
    }
    
}
