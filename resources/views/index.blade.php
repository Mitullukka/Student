@extends('layouts.master')
@section('title','List')
@section('content')
<section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Student List</h1>
          </header>
          @if($message=Session::get('success'))
                <div class="alert alert-success" class="close" id="success">
                  {{$message}}
                </div>  
          @endif
          @if($delete = Session::get('delete'))
            <div class="alert alert-danger">
              {{$delete}}
            </div>
          @endif
          @if($update = Session::get('update'))
          <div class="alert alert-primary">
              {{$update}}
            </div>
          @endif
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>List</h4>                  
                    <a href="{{route('student.create')}}" style="float:right"  class="btn btn-info">Add</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <!-- <th>#</th> -->
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($student as $stu)
                        <tr>
                            <!-- <th scope="row">{{$stu->id}}</th> -->
                            <td>{{$stu->name}}</td>
                            <td>{{$stu->lname}}</td>
                            <td>{{$stu->email}}</td>
                            <td>{{$stu->mobile}}</td>
                            <td>
                              <form method="post" action="{{route('student.destroy',$stu->id)}}">
                                <a href="{{route('student.edit',$stu->id)}}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="btn btn-danger">Delete</button> 
                              </form>
                            </td>
                        </tr>
                        @endforeach
                       
                      </tbody>
                    </table>
                   <div> {{ $student->links() }} </div>
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
     