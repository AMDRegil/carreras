@extends('carrera.layouts.app')
@section('content')
<div class="row">
<div class="col-lg-11">
<h2>Laravel 9 CRUD Example</h2>
</div>
<div class="col-lg-1">
<a class="btn btn-success" href="{{ route('carrera.create') }}">Add</a>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>No</th>
<th>First Name</th>
<th>Last Name</th>
<th>Address</th>
<th width="280px">Action</th>
</tr>
@php
$i = 0;
@endphp
@foreach ($carreras as $carrera)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $carrera->first_name }}</td>
<td>{{ $carrera->last_name }}</td>
<td>{{ $carrera->address }}</td>
<td>
<form action="{{ route('carrera.destroy',$carrera->id) }}" method="POST">
<a class="btn btn-info" href="{{ route('carrera.show',$carrera->id) }}">Show</a>
<a class="btn btn-primary" href="{{ route('carrera.edit',$carrera->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
@endsection