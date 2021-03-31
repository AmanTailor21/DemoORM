<?php

namespace App\Http\Controllers;

use App\Models\employess;
use Illuminate\Http\Request;

class EmployessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=employess::paginate(1);
        return view("ViewEmployee")->with('employees',$employees);
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
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'number'=>'required|numeric',
            'password'=>'required|min:5',
            'image'=>'required'
        ]);
        $imageName = $request->file('image')->getClientOriginalName();
        $request->image->storeAs('public/images', $imageName);

       /* $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public/images');*/

        $employee=new employess();
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->number=$request->number;
        $employee->password=$request->password;
        $employee->image=$imageName;
        $employee->save();
        return back()->with('msg','Inserted Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employess  $employess
     * @return \Illuminate\Http\Response
     */
    public function show(employess $employess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employess  $employess
     * @return \Illuminate\Http\Response
     */
    public function edit(employess $employess)
    {
        return view("UpdateEmployee")->with('data',$employess);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employess  $employess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employess $employess)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'number'=>'required|numeric',
            'password'=>'required|min:5'
        ]);
        $employess->name=$request->name;
        $employess->email=$request->email;
        $employess->number=$request->number;
        $employess->password=$request->password;
        $employess->save();
        return back()->with('msg','Update Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employess  $employess
     * @return \Illuminate\Http\Response
     */
    public function destroy(employess $employess)
    {
        $employess->delete();
        return back();
    }
}

