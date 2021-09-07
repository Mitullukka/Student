<?php

namespace App\Http\Controllers;

use App\Models\Companie;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Company\StoreRequest;
use App\Http\Requests\Company\UpdateRequest;
use App\Rules\Uppercase;
use App\DataTables\CompanieDataTable;
class CompanieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CompanieDataTable $datatable)
    {
        return $datatable->render('companyindex');
        //$companie = Companie::orderBy('id','DESC')->paginate(5);
        //return view('companyindex',compact('companie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companycreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $file = $request->file('logo');
        $name = $file->getClientOriginalName();
        $file->move('uploads/',$name);
        
        $companie = new Companie;
        $companie->name = $request->name;
        $companie->email = $request->email;
        $companie->logo = $name;
        $companie->website = $request->website;
        $companie->save();
        return redirect()->route('companies.index')->with('success','Insert Succesfully'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companie  $companie
     * @return \Illuminate\Http\Response
     */
    public function show(Companie $companie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Companie  $companie
     * @return \Illuminate\Http\Response
     */
    public function edit(Companie $companie,$id)
    {
        $companie = Companie::find($id);
        return view('compnayedit',compact('companie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Companie  $companie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,Companie $companie)
    {   
        $companie = new Companie;
        $companie = Companie::find($request->id);
        $companie->name = $request->name;
        $companie->email = $request->email;
        $companie->website = $request->website;

        if($request->hasFile('logo'))
        {
            $destination = 'uploads/'.$companie->logo;  
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('logo');
            $name = $file->getClientOriginalName();
            $file->move('uploads/',$name);
            $companie->logo = $name;
        }
        $companie->update();
        return redirect()->route('companies.index')->with('success','Update Succesfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Companie  $companie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companie $companie,$id)
    {
        Employee::where('companie_id',$id)->delete();
        $companie = Companie::where('id',$id)->delete();
        return redirect()->route('companies.index')->with('delete','Delete Succesfully');
    }
}

