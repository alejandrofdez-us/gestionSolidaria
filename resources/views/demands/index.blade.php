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
                                <th colspan="3">Acciones</th>
                            </tr>

                            @foreach ($demands as $demand)


                                <tr>
                                    <td>{{ $demand->description }}</td>
                                    <td>{{ $demand->demandType }}</td>
                                    <td>{{ $demand->validity}}</td>
                                    <td>{{ $demand->accepted}}</td>
                                    <td>{{ $demand->satisfied}}</td>
                                    <td>
                                        {!! Form::open(['route' => ['demands.show',$demand->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Detalles', ['class'=> 'btn btn-outline-primary'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['demands.edit',$demand->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        @if($demand->cancelled!=null)
                                            {!! Form::open(['route' => ['reactivar',$demand->id], 'method' => 'get']) !!}
                                            {!!   Form::submit('Reactivar', ['class'=> 'btn btn-success' ,'onclick' => 'if(!confirm("¿Está seguro que desea reactivarla?"))event.preventDefault();'])!!}
                                            {!! Form::close() !!}

                                        @else
                                            {!! Form::open(['route' => ['cancelar',$demand->id], 'method' => 'get']) !!}
                                            {!!   Form::submit('Cancelar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro que desea cancelarla?"))event.preventDefault();'])!!}
                                            {!! Form::close() !!}

                                        @endif
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
