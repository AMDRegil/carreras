@extends('carrera.layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-11">
            <h2>Add New carrera</h2>
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
    <form action="{{ route('carrera.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="Nombre" placeholder="Enter First Name" name="Nombre">
        </div>
        <div class="form-group">
            <label for="Area">Last Name:</label>
            <input type="text" class="form-control" id="Area" placeholder="Enter Last Name" name="Area">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection