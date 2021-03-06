@extends('layouts.master')
@section('title','EmployeeCreate')
@section('content')
@push('css')
    <style>
    .error{
      color:red;
    }
    </style>
@endpush
<section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Employee</h1>
          </header>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Add</h4>
                </div>
                <div class="card-body">
                   
                  <form class="form-horizontal"  action="{{route('employee.store')}}" method="POST">
                 
                      @csrf
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">FirstName</label>
                      <div class="col-sm-10">
                        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" Placeholder="Enter First Name">
                        <span style="color:red">
                          @error('name')
                          {{$message}}
                          @enderror
                        </style>
                      </div>
                    </div>
                      
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">LastName</label>
                      <div class="col-sm-10">
                        <input type="text" name="lname" id="lname" value="{{old('lname')}}" class="form-control" Placeholder="Enter LastName">
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
                        <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control" Placeholder="Enter Email">
                        <span style="color:red">
                        @error('email')
                          {{$message}}
                        @enderror
                        <span>
                      </div>
                    </div>
                     
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Mobile</label>
                      <div class="col-sm-10">
                        <input type="text" name="mobile" id="mobile" value="{{old('mobile')}}"  class="form-control" Placeholder="Enter Mobile">
                        <span style="color:red">
                        @error('mobile')
                          {{$message}}
                        @enderror
                        <span>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Gender<br></label>
                      <div class="col-sm-10">
                       
                        <div>
                          <input id="optionsRadios1" type="radio" checked="" value="1" name="gender">
                          <label for="optionsRadios1">Male</label>
                        </div>
                        <div>
                          <input id="optionsRadios2" type="radio" value="2" name="gender">
                          <label for="optionsRadios2">Female</label>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Company</label>
                      <div class="col-sm-10 mb-3">
                        <select name="companie_id" class="form-control">
                          <option>Select</option>                          
                          @foreach($employee as $value)
                          <option value="{{$value->id}}">{{$value->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-2">
                        <button type="submit" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </form>
                  <!-- {{Form::close()}} -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
