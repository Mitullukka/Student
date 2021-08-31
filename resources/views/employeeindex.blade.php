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
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>List</h4>                  
                    <a href="{{route('employee.create')}}" style="float:right"  class="btn btn-success"><i class="fa fa-plus"></i> Create new employee</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>CompanyName</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($employee as $stu)
                        <tr>
                            <th scope="row">{{$stu->id}}</th> 
                            <td>{{$stu->fname}}</td>
                            <td>{{$stu->lname}}</td>
                            <td>{{$stu->email}}</td>
                            <td>{{$stu->mobile}}</td>
                            <td>{{$stu->companie->name}}</td>
                            <td>
                                <form method="POST" action="{{route('employee.destroy',$stu->id)}}">
                                    <a href="{{route('employee.edit',$stu->id)}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>    
                                </form>   
                            </td>
                        </tr>
                        @endforeach
                       
                      </tbody>
                    </table>
                   
                   <div> {{$employee->links('pagination::bootstrap-4')}}  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
     @endsection 

     @push('js')
        <script type="text/javascript">
            $(document).ready(function(){
                setTimeout(function(){
                  $("div.alert").remove();
                },3000);
            });
        </script>
     @endpush
     