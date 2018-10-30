@extends('layouts.app')

@section('extra-css')
  <style type="text/css">
    .table td {
        text-align: center;
    }
    .table th {
        text-align: center;
    }

  </style>
@endsection

@section('content')
<div class="wraper container-fluid">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="title">Estimaciones</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <table class="table table-responsive">
                        <thead>
                            <th>Actores Simples</th>
                            <th>Actores Promedios</th>
                            <th>Actores Complejos</th>
                            <th>CUS Simples</th>
                            <th>CUS Promedios</th>
                            <th>CUS Complejos</th>
                            <th>TEF</th>
                            <th>Factor de productividad</th>
                            <th>Fecha</th>
                            <th>Esfuerzo Estimado (Horas-hombre)</th>
                        </thead>
                        <tbody>
                        @foreach ($estimations as $estimation)
                            <tr>
                                <td>{{$estimation->s_actor}}</td>
                                <td>{{$estimation->a_actor}}</td>
                                <td>{{$estimation->c_actor}}</td>
                                <td>{{$estimation->s_usecase}}</td>
                                <td>{{$estimation->a_usecase}}</td>
                                <td>{{$estimation->c_usecase}}</td>
                                <td>{{$estimation->tef}}</td>
                                <td>{{$estimation->f_productivity}}</td>
                                <td>{{$estimation->request_date}}</td>
                                <td>{{$estimation->effort_estimated}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-success" href="{{ route('estimations.create') }}">Nueva estimacion</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
