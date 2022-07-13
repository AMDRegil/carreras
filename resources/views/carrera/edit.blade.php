@extends('carrera.layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-11">
            <h2>Actualizar carrera</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('carrera') }}"> Back</a>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('carrera.update',$carrera->id) }}" >
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="Nombre">Nombre:</label>
            <input type="text" class="form-control" id="Nombre" placeholder="Ingresar Nombre" name="Nombre" value="{{ $carrera->nombre }}">
        </div>
        <div class="form-group">
            <label for="Area">Área:</label>
            <input type="text" class="form-control" id="Area" placeholder="Ingresar Área" name="Area" value="{{ $carrera->area }}">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection
} else {

    