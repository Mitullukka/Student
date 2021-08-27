@extends('layouts.master')
@section('title','Create')
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
            <h1 class="h3 display">Students</h1>
          </header>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Add</h4>
                </div>
                <div class="card-body">
                   
                  <form class="form-horizontal" id="myform" action="{{route('student.store')}}" method="POST">
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
                      <label class="col-sm-2 form-control-label">LastName</label>
                      <div class="col-sm-10">
                        <input type="text" name="lname" id="lname" class="form-control" Placeholder="Enter LastName">
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
                        <input type="text" name="email" id="email" class="form-control" Placeholder="Enter Email">
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
                        <input type="text" name="mobile" id="mobile"  class="form-control" Placeholder="Enter Mobile">
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
  <script type="text/javascript">
  $('#myform').validate({          
        rules :{
          name:{
            required:true,
            noSpace:true,
            minlength: 3,
            maxlength: 20
          },
          lname:{
            required:true,
            noSpace:true
          },
          email:{
            required:true
          },
          mobile:{
            required:true
          }        
        },
        messages:{
          name:{
            required:"Please Enter Name",
            minlength:"Please enter minimum 3 chrachter"
          },
          lname:{
            required:"Please enter last name"
          },
          email:{
            required:"Please enter email"
          },
          mobile:{
            required:"Please enter mobile"
          }
        },
        submitHandler:function(form)
        {
          submit.form();
        }
  });     

    jQuery.validator.addMethod("noSpace",function(value,element){ 
      return value.indexOf(" ") < 0 && value != "";
    },"No space allowed");
  </script>
  @endpush
<!-- @if($errors)
                      @foreach($errors->all() as $errors)
                        <li style="color:red">
                          {{$errors}}
                        </li>
                      @endforeach
                    @endif  -->
