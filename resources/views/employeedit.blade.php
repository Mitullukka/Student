@extends('layouts.master')
@section('title','Update')
@section('content')
<section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Compnay</h1>
          </header>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Update</h4>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" enctype="multipart/form-data"  action="{{route('employee.update',$employee->id)}}" method="POST">
                    @csrf    
                    @method('PUT')         
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="fname" value="{{old('fname', $employee->fname)}}" class="form-control">
                        <span style="color:red">
                            @error('fname')
                              {{$message}}
                            @enderror 
                        </span>
                      </div>
                    </div>
                    

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">LastName</label>
                      <div class="col-sm-10">
                        <input type="text" name="lname" value="{{old('lname',$employee->lname)}}" class="form-control">
                        <span style="color:red">
                            @error('lname')
                              {{$message}}
                            @enderror 
                        </span>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" name="email" value="{{old('email',$employee->email)}}" class="form-control" Placeholder="Enter Email">
                        <!-- {{old('email') ?? $employee->email}} -->
                        <span style="color:red">
                            @error('email')
                              {{$message}}
                            @enderror 
                        </span>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Mobile</label>
                      <div class="col-sm-10">
                        <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile" value="{{old('mobile',$employee->mobile) }}" class="form-control">
                        <span style="color:red">
                            @error('mobile')
                              {{$message}}
                            @enderror 
                        </span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Gender<br></label>
                      <div class="col-sm-10">
                        <div>
                          <input id="optionsRadios1" type="radio"  value="1" {{ $employee->gender == '1' ? 'checked' : ''}} name="gender">
                          <label for="optionsRadios1">Male</label>
                        </div>
                        <div>
                          <input id="optionsRadios2" type="radio"  value="2" {{ $employee->gender == '2' ? 'checked' : ''}} name="gender">
                          <label for="optionsRadios2">Female</label>
                        </div>
                      </div>
                    </div>
                     
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Company</label>
                      <div class="col-sm-10 mb-3">
                        <select name="companie_id" class="form-control" >
                          <option>Select</option>                          
                            @foreach($compnay as $value)
                                <option value="{{$value->id}}" @if($value->id==$employee->companie_id) selected @endif>{{$value->name}}</option>                                  
                            @endforeach
                          
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-2">
                        <button type="submit" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
