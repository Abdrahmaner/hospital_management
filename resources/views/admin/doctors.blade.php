@extends('layouts.default')

@section('content')

<div class="container">
    <h1 class="h1">the available Doctors</h1>
    <hr>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Lastname</th>
        <th>Service</th>
		<th>Email</th>
        <th colspan='2' style="text-align:center;">action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $u)
      <tr>
        <td>{{$u->name}}</td>
        <td>{{$u->lastname}}</td>
        <td>{{$u->service}}</td>
        <td>{{$u->email}}</td>
          <td><a href="{{route('dashboard.edit',$u->id)}}" class="btn btn-link">modifier</a></td>
          <td><form action="{{route('dashboard.destroy',$u->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class='btn btn-link'>supprimer</button>
          </form></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <a href="{{route('registerdoc')}}" class='btn btn-link'>Ajouter un docteur</a>
</div>


@endsection