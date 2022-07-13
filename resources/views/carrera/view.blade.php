@extends('carrera.layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-11">
                <h2>Carreras CRUD</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('carrera') }}"> Regresar</a>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Nombre</th>
            <td>{{ $carrera->nombre }}</td>
        </tr>
        <tr>
            <th>Área</th>
            <td>{{ $carrera->area }}</td>
        </tr>
 
    </table>
@endsection