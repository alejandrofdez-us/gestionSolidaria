@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar demanda</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($demanda, [ 'route' => ['demands.update',$demanda->id], 'method'=>'PUT']) !!}


                        <div class="form-group">
                            {!! Form::label('description', 'Descripción') !!}
                            {!! Form::text('description',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('validity', 'Caducidad de la demanda') !!}
                            <input type="datetime-local" id="validity" name="validity" class="form-control" value="{{$demanda->validity}}" />
                        </div>

                        <div class="form-group">
                            {!!Form::label('demandType', 'Tipo de demanda') !!}
                            <br>
                            {!! Form::select('demandType',['pasearMascota'=>'Pasear mascota','trasladoMedico'=>'Traslado al médico','compraSupermercado'=>'Compra en el supermercado','sacarBasura'=>'Sacar la basura','compraFarmacia'=>'Compra en la farmacia','otros'=>'Otros'], ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Actualizar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
