@extends('layouts.master')
@section('title','CompanyCreate')
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
            <h1 class="h3 display">Companies</h1>
          </header>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Add</h4>
                </div>
                <div class="card-body">
                   
                  <form class="form-horizontal" id="myform"  enctype="multipart/form-data" action="{{route('companies.store')}}" method="POST">
                      @csrf                      
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="name" id="name" class="form-control" Placeholder="Enter First Name">
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
                        <input type="text" name="email" id="email" class="form-control" Placeholder="Enter Email">
                        <span style="color:red">
                        @error('email')
                            {{$message}}
                        @enderror
                      </div>
                    </div>
                     
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Logo</label>
                      <div class="col-sm-10">
                        <input type="file" name="logo" id="logo"  class="form-control">
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
                        <input type="text" name="website" id="website"  class="form-control" Placeholder="Enter Website">
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
                        <button type="submit" class="btn btn-primary">Save changes</button>
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

@push('js')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/additional-methods.js"></script>

@endpush