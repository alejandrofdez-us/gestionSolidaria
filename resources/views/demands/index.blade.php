@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Demandas</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'demands.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear demanda', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Descripción</th>
                                <th>Tipo de demanda</th>
                                <th>Fecha de caducidad</th>
                                <th>Fecha de aceptación</th>
                                <th>Fecha de realización</th>
                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($demands as $demand)


                                <tr>
                                    <td>{{ $demand->description }}</td>
                                    <td>{{ $demand->demandType }}</td>
                                    <td>{{ $demand->validity}}</td>
                                    <td>{{ $demand->accepted}}</td>
                                    <td>{{ $demand->satisfied}}</td>
                                    <td>
                                        {!! Form::open(['route' => ['demands.edit',$demand->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['demands.destroy',$demand->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
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
