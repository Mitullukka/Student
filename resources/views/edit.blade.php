@extends('layouts.master')
@section('title','Update')
@section('content')
<section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Students</h1>
          </header>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Update</h4>
                </div>
                <div class="card-body">
                  <form class="form-horizontal"  action="{{route('student.update',$student->id)}}" method="POST">
                      @csrf  
                      @method('PUT')                    
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="name" value="{{$student->name}}" class="form-control">
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">LastName</label>
                      <div class="col-sm-10">
                        <input type="text" name="lname" value="{{$student->lname}}" class="form-control" Placeholder="Enter LastName">
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
                        <input type="text" name="email" value="{{$student->email}}" class="form-control" Placeholder="Enter Email">
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
                        <input type="text" name="mobile" value="{{$student->mobile}}" class="form-control" Placeholder="Enter Mobile">
                        <span style="color:red">
                            @error('mobile')
                              {{$message}}
                            @enderror 
                        </span>
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
