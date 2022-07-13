@extends('carrera.layouts.app')
@section('content')
<div class="row">
<div class="col-lg-11">
<h2>Carreras CRUD</h2>
</div>
<div class="col-lg-1">
<a class="btn btn-success" href="{{ route('carrera.create') }}">Añadir</a>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>No.</th>
<th>Nombre</th>
<th>Área</th>
<th width="280px">Acción</th>
</tr>
@php
$i = 0;
@endphp
@foreach ($carreras as $carrera)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $carrera->nombre }}</td>
<td>{{ $carrera->area }}</td>
<td>
<form action="{{ route('carrera.destroy',$carrera->id) }}" method="POST">
<a class="btn btn-info" href="{{ route('carrera.show',$carrera->id) }}">Mostrar</a>
<a class="btn btn-primary" href="{{ route('carrera.edit',$carrera->id) }}">Actualizar</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Eliminar</button>
</form>
</td>
</tr>
@endforeach
</table>
@endsection