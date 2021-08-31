<?php

namespace App\Http\Controllers;

use App\Models\Companie;
use Illuminate\Http\Request;

class CompanieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $companie = Companie::paginate(5);
         return view('companyindex',compact('companie'));
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
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:companies',
            'logo'=>'required|mimes:jpeg,jpg,png',
            'website'=>'required'
        ]);

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
    public function update(Request $request,Companie $companie)
    {   
        $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|unique:companies,email,'.$request->id,
            //'logo'=>'required|mimes:jpeg,jpg,png',
            'website'=>'required'
        ]);
       
        $file = $request->file('logo');
        $name = $file->getClientOriginalName();
        $file->move('uploads/',$name);
        
        $companie = new Companie;
        $companie = Companie::find($request->id);
        $companie->name = $request->name;
        $companie->email = $request->email;
        $companie->logo = $name;
        $companie->website = $request->website;
        $companie->save();
    
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
        $companie = Companie::find($id);
        $companie->delete();
        return redirect()->route('companies.index')->with('delete','Delete Succesfully');
    }
}
