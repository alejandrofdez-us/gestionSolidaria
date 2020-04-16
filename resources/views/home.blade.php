@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido {{ Auth::user()->name }}.</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Usted a accedido correctamente a la aplicación de gestión solidaria.<br>
                    Use el menú superior para acceder a las demandas.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
