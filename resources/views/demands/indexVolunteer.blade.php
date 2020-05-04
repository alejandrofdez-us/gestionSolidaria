@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Demandas</div>

                    <div class="panel-body">
                        @include('flash::message')

                        <div class="form-group">
                            {!! Form::open(['route' => ['myCPDemands'], 'method' => 'get']) !!}
                            {!! Form::text('query',null,['class'=>'col-md-4', 'autofocus', 'placeholder'=>'término a buscar']) !!}
                            {!! Form::submit('Buscar', ['class'=> 'btn btn-success col-md-2'])!!}
                            {!! Form::close() !!}
                        </div>


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
                                        @if($demand->accepted == null)
                                            {!!   Form::submit('Aceptar', ['class'=> 'btn btn-success'])!!}
                                        @else
                                            {!!   Form::submit('Aceptar',  ['disabled', 'class'=> 'btn btn-outline-primary'])!!}
                                        @endif
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
