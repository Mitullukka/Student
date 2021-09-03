@extends('layouts.master')
@section('content')

<div class="col-md-12">
<div class="box box-warning">
<div class="box-header with-border">
<span class="pull-right">
<!-- <a id="js_back" href="" class="btn btn-warning" >Back</a> -->
</span>
</div>
<section class="forms">
    <div class="container-fluid">
        <header> 
            <h1 class="h3 display">Employee</h1>
        </header>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{ Form::model(array('action' => 'employee\EmployeeController@create','class'=>'form-horizontal','method' => 'post','id'=>"js_form",'enctype'=>"multipart/form-data")) }}
                            @csrf
                            {{Form::hidden('id')}}

                                <div class="form-group row">
                                {{Form::label('FirstName','Name',array('class' => 'col-sm-2 form-control-label'))}}
                                    <div class="col-sm-10  mb-3">
                                        {{Form::text('name',null,array( 'placeholder' => 'Name','class' => 'form-control',
                                        'id' => 'name')
                                        )}}
                                    </div>
                                    <span class="help-block js_error_span"></span>
                                </div>

                                <div class="form-group row">
                                {{Form::label('LastName','LastName',array('class'=>'col-sm-2 form-control-label'))}}
                                    <div class="col-sm-10  mb-3">
                                        {{Form::text('name_es',null,array( 'placeholder' => 'Enter lastname ','class' => 'form-control',
                                        'id' => 'name_es')
                                        )}}
                                    </div>
                                    <span class="help-block js_error_span"></span>
                                </div>

                                <div class="form-group row">
                                {{Form::label('item_type','Email',array('class'=>'col-sm-2 form-control-label'))}}
                                    <div class="col-sm-10  mb-3">
                                        {{Form::text('item_type',null,array( 'placeholder' => 'Enter email','class' => 'form-control',
                                        'id' => 'item_type')
                                        )}}
                                    </div>
                                    <span class="help-block js_error_span"></span>
                                </div>

                                <div class="form-group row">
                                {{Form::label('item_type_es','Mobile',array('class'=>'col-sm-2 form-control-label'))}}
                                    <div class="col-sm-10 mb-3">
                                        {{Form::text('item_type_es',null,array( 'placeholder' => 'Enter mobile','class' => 'form-control',
                                        'id' => 'item_type_es')
                                        )}}
                                    </div>
                                    <span class="help-block js_error_span"></span>
                                </div>

                            </div>
                            <!-- /.box-body -->
                                <div class="form-group row">
                                    <div class="col-sm-4 offset-sm-2">
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                            {{Form::button('Save',array('class'=>'btn btn-primary','id'=>"js_submit_ajax"))}}
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection    