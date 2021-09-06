@extends('layouts.master')
@section('title','List')
@section('content')
<section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Employee List</h1>
          </header>
          @if($message = Session::get('success'))
          <div class="alert alert-success" class="close" id="success">
              {{$message}}
          </div>
          @endif

          @if($delete = Session::get('delete'))
          <div class="alert alert-danger" class="close" id="success">
              {{$delete}}
          </div>
          @endif
          <a href="{{route('employee.create')}}" style="float:right"  class="btn btn-success"><i class="fa fa-plus"></i> Create new Employee</a>
          {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}
        </div>
      </section>
     @endsection 

     @push('js')
     {!! $dataTable->scripts() !!}
        <script type="text/javascript">
            $(document).ready(function(){
                setTimeout(function(){
                  $("div.alert").remove();
                },3000);
            });
        </script>
     @endpush
     