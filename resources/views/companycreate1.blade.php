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
                   
                 {{Form::model(array('action'=>'','class'=>'form-horizontal','method'=>'post','enctype'=>'multipart/form-data'))}}
                    <!-- {{Form::open(array('url'=>'','class'=>'form-horizontal','method'=>'post','enctype'=>'multipart/form-data'))}} -->
                    @csrf                      
                    <div class="form-group row">
                        {{Form::label('FirstName','Name',array('class'=>'col-sm-2 Form-control-label'))}}
                        <div class="col-sm-10">
                            {{Form::text('name',null,array('Placeholder'=>'Enter Name','class'=>'form-control'))}}
                        </div>
                    </div>
                      
                    <div class="form-group row">
                        {{Form::label('Email','Email',array('class'=>'col-sm-2 Form-control-label'))}}
                        <div class="col-sm-10">
                            {{Form::text('email',null,array('Placeholder'=>'Enter email','class'=>'form-control'))}}
                        </div>
                    </div>
                     
                    <div class="form-group row">
                        {{Form::label('Logo','Logo',array('class'=>'col-sm-2 form-control-label'))}}
                        <div class="col-sm-10">
                            {{Form::file('logo',null,array('class'=>'form-control'))}}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{Form::label('Website','Website',array('class'=>'col-sm-2 Form-control-label'))}}
                        <div class="col-sm-10">
                            {{Form::text('website',null,array('Placeholder'=>'Enter Website','class'=>'form-control'))}}
                        </div>
                    </div>                
                    
                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-2">
                        <button type="submit" class="btn btn-secondary">Cancel</button>
                        {{Form::submit('Submit',array('class'=>'btn btn-success'))}}
                      </div>
                    </div>
                  {{ Form::close() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
