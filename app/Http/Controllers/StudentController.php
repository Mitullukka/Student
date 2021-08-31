<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $student = Student::paginate(5);
        return view('index',compact('student'));
    }

    public function dashboard(Request $request)
    {
        //dd($request->path());
        // return response()->json([
        //     'name'=>'mitul'
        // ]);
        return view('dashboard');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
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
            'lname'=>'required',
            'email'=>'required|unique:students',
            'mobile'=>'required',
            'image'=>'required'
        ]);
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $file->move('images/',$name);
        
        $student = new Student;
        $student->name=$request->name;
        $student->lname=$request->lname;
        $student->email=$request->email;
        $student->mobile=$request->mobile;
        $student->image=$name;
        $student->save();
        return redirect()->route('student.index')->with('success',"Insert succesfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student,$id)
    {
        $student = Student::find($id);
        return view('edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student,$id)
    {
        $student = Student::find($id);
        // $student->update($request->all());
        
        $destination = 'images/'.$student->image;
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $file->move('images/',$name);
        
        $student = new Student;
        $student->name=$request->name;
        $student->lname=$request->lname;
        $student->email=$request->email;
        $student->mobile=$request->mobile;
        $student->image=$name;
        $student->update();
        return redirect()->route('student.index')->with("update","Update succesfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student,$id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('student.index')->with('delete',"Delete Sucessfully!");
    }
}


