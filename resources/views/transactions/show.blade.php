@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Detalle de la Transacci&oacute;n</h4>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-1">
                    <label for="id">Id</label>
                </div>
                <div class="col-md-2">
                    <label for="id">Fecha</label>
                </div>
                <div class="col-md-2">
                    <label for="id">Descripci&oacute;n</label>
                </div>
                <div class="col-md-2">
                    <label for="id">Categoria</label>
                </div>
                <div class="col-md-2">
                    <label for="id">Tipo</label>
                </div>
                <div class="col-md-2">
                    <label for="id">Monto</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    {{$transaction->id}}
                </div>
                <div class="col-md-2">
                    {{$transaction->fecha_transaction}}
                </div>
                <div class="col-md-2">
                    {{$transaction->descripcion}}
                </div>
                <div class="col-md-2">
                    {{$transaction->TransactionCategory->name}}
                </div>
                <div class="col-md-2">
                    {{$transaction->TransactionCategory->TransactionType->name}}
                </div>
                <div class="col-md-2">
                    {{$transaction->monto}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
