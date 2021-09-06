<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Companie;
use Illuminate\Http\Request;
use App\Http\Requests\Employee\StoreRequest;
use App\Http\Requests\Employee\UpdateRequest;
use App\DataTables\EmployeesDataTable;
use Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmployeesDataTable $datatable)
    {
        
        //return $datatable->render('employeeindex');
        // $employee = Employee::with('companie')->get();
         $employee = Employee::with('companie')->orderBy('id','DESC')->paginate(5);
         return view('employeeindex',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Companie::all();
        return view('employecrete',compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    { 
        $employee = new Employee;
        $employee->fname = $request->name;
        $employee->lname = $request->lname;
        $employee->email = $request->email;
        $employee->mobile = $request->mobile;
        $employee->companie_id = $request->companie_id;
        $employee->save();

        return redirect()->route('employee.index')->with('success','Insert Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee,$id)
    {
       $compnay = Companie::all();
       $employee = Employee::with('companie')->find($id);
       return view('employeedit',compact('compnay','employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Employee $employee)
    {
        $employee = new Employee;
        $employee = Employee::find($request->id);
        $employee->fname = $request->fname;
        $employee->lname = $request->lname;
        $employee->email = $request->email;
        $employee->mobile = $request->mobile;
        $employee->companie_id = $request->companie_id;
        $employee->save();

        return redirect()->route('employee.index')->with('success','Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee,$id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employee.index')->with('delete',"Delete Successfully");
    }
}
