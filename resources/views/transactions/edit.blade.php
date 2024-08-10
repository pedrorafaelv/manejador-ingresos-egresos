@extends('layouts.app')

@section('content')
    <h6>Editar Transacci&oacute;n: {{$transaction->id}}</h6>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('transactions.update',  $transaction) }}" method="POST">
                    @csrf
                    @method('put')
                <div class="row">
                    <div class="col-md-1">
                        Id
                    </div>
                    <div class="col-md-2">
                        Fecha
                    </div>
                    <div class="col-md-2">
                        Descripci&oacute;n
                    </div>
                    <div class="col-md-2">
                        Categoria
                    </div>
                    <div class="col-md-2">
                        Tipo
                    </div>
                    <div class="col-md-2">
                        Monto
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        {{$transaction->id}}
                    </div>
                    <div class="col-md-2">
                        <input type="date" name="fecha_transaccion" id="fecha_transaccion" value = "{{$transaction->fecha_transaccion}}">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="descripcion" id="descripcion" value="{{$transaction->descripcion}}">
                    </div>
                    <div class="col-md-2">
                        <select class="form-control" id="transaction_category_id" name="transaction_category_id" required >
                            @foreach ($TransactionCategories as $id=> $category)
                                <option  {{$transaction->transaction_category_id == $id ? 'selected':''}} value="{{$id}}">{{$category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                       <div id= "TransactionType">
                        {{$transaction->TransactionCategory->TransactionType->name}}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="monto" id="monto" value ="{{$transaction->monto}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class= " btn btn-link" type="submit">Guardar</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
