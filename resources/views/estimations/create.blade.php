@extends('layouts.app')

@section('content')

@if ($errors->all())
<div class="alert alert-danger">
    <ul class="parsley-errors-list filled">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif

<div class="wraper container-fluid">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="title">Nueva estimacion de esfuerzo</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <form method="POST">
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

                        <div class="form-group col-md-12">
                            <label class="control-label">Nro. de actores simples</label>
                            <input class="form-control" type="text" name="s_actor" value="{{ old('s_actor') }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Nro. de actores promedio</label>
                            <input class="form-control" type="text" name="a_actor" value="{{ old('a_actor') }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Nro. de actores complejos</label>
                            <input class="form-control" type="text" name="c_actor" value="{{ old('c_actor') }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Nro. de CUS simples</label>
                            <input class="form-control" type="text" name="s_usecase" value="{{ old('s_usecase') }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Nro. de CUS promedio</label>
                            <input class="form-control" type="text" name="a_usecase" value="{{ old('a_usecase') }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Nro. de CUS complejos</label>
                            <input class="form-control" type="text" name="c_usecase" value="{{ old('c_usecase') }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Suma de factores tecnicos y ambientales</label>
                            <input class="form-control" type="text" name="tef" value="{{ old('tef') }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Factor de productividad</label>
                            <input class="form-control" type="text" name="f_productivity" value="{{ old('f_productivity') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <button class="btn btn-primary">Estimar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection