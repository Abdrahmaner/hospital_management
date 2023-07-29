@extends('layouts.default')
@section('content')
<div class='form-group'>

<form action="{{ route('docupdate') }}" method="POST" style="width:50%;margin:auto;">

    @method('PATCH')
    @csrf
  <div class="form-group">
  <h1 class="h1">Update user </h1>
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{$user->name}}">
  </div>
  <div class="form-group">
    <label for="lastname">Lastname:</label>
    <input type="text" class="form-control" name="lastname" placeholder="Enter lastname" value="{{$user->lastname}}">
  </div>
  <div class="form-group">
    <label for="email">email:</label>
    <input type="text" class="form-control" name="email" placeholder="Enter email" value="{{$user->email}}">
  </div>
  <div class="form-group">
    <label for="service">service:</label>
    <input type="text" class="form-control" name="service" placeholder="Enter service" value="{{$user->service}}">
  </div>
  
  <div class="form-group">
    
    
     <button type="submit" class="btn btn-primary">Update</button>
  </div>
 
</form>
</div>
</div>
@endsection
