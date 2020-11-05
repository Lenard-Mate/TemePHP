
@extends('master')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Student Data</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="right">
  <a href="http://127.0.0.1:8000/add" class="btn btn-primary">Add</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
   <th>id</th>
    <th>First Name</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   @foreach($students as $row)
   <tr>
   <td>{{$row['id']}}</td>
    <td>{{$row['first_name']}}</td>
   
    <td><a href="http://127.0.0.1:8000/edit" class="btn btn-warning">Edit</a></td>
    <td></td>
   </tr>
   @endforeach
  </table>
 </div>
</div>

@endsection