@extends('layouts.app')

@section('content')

    @if ( session('message') )
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    @if ( session('sad_message') )
    <div class="alert alert-danger">
        {{ session('sad_message') }}
    </div>
    @endif

    <div class="wraper container-fluid">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-body">
                     <h2 style="text-align: center;">El esfuerzo estimado para realizar las pruebas es de: </h2>
                     <h2 style="text-align: center;">{{$output}} horas-hombre</h2>
                     <div class="text-center">
                        <a class="btn btn-primary" href="{{ route('estimations.index') }}">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection