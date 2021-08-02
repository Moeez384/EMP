<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::paginate(10);
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'name' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'cnic' => 'required|string|min:13|max:13|unique:users',
            'contact' => 'required|string|min:11|max:11',
            'address' => 'required|string',
            'dob' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'joining' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'empid' =>'required|numeric|unique:users',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required|string|confirmed|min:8',
            'role'=>'required|string',
            'checkDate'=>'required',
        ]);

        // $input = $request->all();
        if ($image = $request->file('image')) {

            $destinationPath = 'image/';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $input['image'] = "$profileImage";

        }

    

        // User::create($input);

        // $name = $request->file('image')->getClientOriginalName();
        // $path = $request->file('image')->store('public/files'); 
        $save = new User;
        $save->name = $request->name;
        $save->fname=$request->fname;
        $save->cnic=$request->cnic;
        $save->contact=$request->contact;
        $save->address=$request->address;
        $save->empid=$request->empid;
        $save->checkDate=now()->format('Y-m-d');
        $save->dob=$request->dob;
        $save->position=$request->position;
        $save->joining=$request->joining;
        $save->qualification=$request->qualification;
        $save->salary=$request->salary;
        $save->email=$request->email;
        $save->role=$request->role;
        $save->attendanceDate=date('Y-m-d');
        $save->attendance_status=3;
        $save->password=Hash::make($request->password);
        $save->image= $input['image'];
 
        $save->save();
        return redirect()->route('users.create')->with('success','User Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users=DB::table('users')->where('id',$id)->first();
        
        return view('users.show',compact('users','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'cnic' => 'required|string|min:13|max:13',
            'contact' => 'required|string|min:11|max:11',
            'address' => 'required|string',
            'dob' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'joining' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'empid' =>'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required|string|confirmed|min:8',
            'role'=>'required|string',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {

            $destinationPath = 'image/';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $input['image'] = "$profileImage";

        }else{

            unset($input['image']);

        }
        $user->update([
            'name' => $request->name,
            'fname'=>$request->fname,
            'cnic' => $request->cnic,
            'contact' => $request->contact,
            'address' => $request->address,
            'dob' =>$request->dob,
            'joining'=>$request->joining,
            'qualification' =>$request->qualification,
            'salary' =>$request->salary,
            'email' => $request->email,
            'empid' =>$request->empid,
            'password' =>Hash::make($request->password),
            'position'=>$request->position,
            'role' =>$request->role,
            'image' =>$input['image'],
        ]);

        return redirect()->route('users.index')->with('success','User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
