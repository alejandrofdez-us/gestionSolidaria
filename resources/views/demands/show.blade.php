@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Demanda con fecha: {{$demanda->created_at}}</div>

                    <div class="panel-body">
                        <div class="row-cols-6"> <span>Tipo de demanda:</span> {{$demanda->demandType}}</div>

                        <div class="row-cols-6"> <span>Descripción:</span> {{$demanda->description}}</div>

                        <div class="row-cols-6"> <span>Fecha de creación:</span> {{$demanda->created_at}}</div>

                        <div class="row-cols-6"> <span>Fecha límite de realización:</span> {{$demanda->validity}}</div>

                        <div class="row-cols-6"> <span>Fecha de aceptación:</span> {{$demanda->accepted}}</div>

                        <div class="row-cols-6"> <span>Fecha de realización:</span> {{$demanda->satisfied}}</div>
                        @if($demanda->volunteeringUser !=null)
                            <div class="row-cols-6"> <span>Voluntario que aceptó la demanda:</span> {{$demanda->volunteeringUser->name}}</div>
                        @endif

                        @if($demanda->cancelled !=null)
                            <div class="row-cols-6"> <span>Fecha de cancelación:</span> {{$demanda->cancelled}}</div>
                        @else
                            {!! Form::open(['route' => ['cancelar',$demanda->id], 'method' => 'get']) !!}
                            {!!   Form::submit('Cancelar', ['class'=> 'btn btn-warning'])!!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
