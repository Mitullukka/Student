@extends('layouts.master')
@section('title','List')
@section('content')
<section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Compnay List</h1>
          </header>
          @if($message = Session::get('success'))
            <div class="alert alert-success" class="close" id="success">
                {{$message}}
            </div>
          @endif
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>List</h4>                  
                    <a href="{{route('companies.create')}}" style="float:right"  class="btn btn-success"><i class="fa fa-plus"></i> Create new company</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Logo</th>
                          <th>Website</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @forelse($companie as $stu)
                        <tr>
                            <th scope="row">{{$stu->id}}</th>
                            <td>{{$stu->name}}</td>
                            <td>{{$stu->email}}</td>
                            <td><img src="{{asset('uploads/'.$stu->logo)}}"  width="100px" height="100px"></td>
                            <td>{{$stu->website}}</td>
                            <td>
                                <form method="POST" action="{{route('companies.destroy',$stu->id)}}">
                                <a href="{{route('companies.edit',$stu->id)}}"   class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                @csrf
                                @method('DELETE')
                                
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                            </td>
                            @empty
                            <td>No data found</td>
                        </tr>
                        @endforelse
                       
                      </tbody>
                    </table>
                   <div> {{ $companie->links('pagination::bootstrap-4') }} </div>
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
     