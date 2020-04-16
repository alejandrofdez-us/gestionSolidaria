@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Demandas</div>

                    <div class="panel-body">
                        @include('flash::message')

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Descripción</th>
                                <th>Tipo de demanda</th>
                                <th>Fecha de aceptación</th>
                                <th>Fecha de realización</th>
                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($demands as $demand)


                                <tr>
                                    <td>{{ $demand->description }}</td>
                                    <td>{{ $demand->demandType }}</td>
                                    <td>{{ $demand->accepted}}</td>
                                    <td>{{ $demand->satisfied}}</td>
                                    <td>
                                        {!! Form::open(['route' => ['aceptar',$demand->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Aceptar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
