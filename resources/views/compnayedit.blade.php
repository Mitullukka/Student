@extends('layouts.master')
@section('title','CompnayUpdate')
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
                  <form class="form-horizontal" enctype="multipart/form-data"  action="{{route('companies.update',$companie->id)}}" method="POST">
                    @csrf    
                    @method('PUT')         
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="name" value="{{old('name',$companie->name) }}" Placeholder="Please enter name" class="form-control">
                        <span style="color:red">
                            @error('name')
                              {{$message}}
                            @enderror 
                        </span>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" name="email" value="{{old('email',$companie->email)}}" Placeholder="Please enter email" class="form-control" Placeholder="Enter Email">
                        <span style="color:red">
                            @error('email')
                              {{$message}}
                            @enderror 
                        </span>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Logo</label>
                      <div class="col-sm-10">
                        <input type="file" name="logo" id="logo"  class="form-control">
                        <img src="{{asset('uploads/'.$companie->logo)}}"   width="50px" height="50px">
                        <span style="color:red">
                            @error('logo')
                              {{$message}}
                            @enderror 
                        </span>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Website</label>
                      <div class="col-sm-10">
                        <input type="text" name="website" value="{{old('website',$companie->website)}}" placeholder="Please enter website" class="form-control" Placeholder="Enter Mobile">
                        <span style="color:red">
                            @error('website')
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
