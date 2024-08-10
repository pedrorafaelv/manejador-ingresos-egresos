@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Transacciones</h4>
    <a href="{{ route('transactions.create') }}" class="btn btn-primary">Agrega una Transacci&oacute;n</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Descripci&oacute;n</th>
                <th>categoria</th>
                <th>tipo</th>
                <th>Monto</th>
                <th>Acci&oacute;n</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->fecha_transaccion }}</td>
                    <td>{{ $transaction->descripcion }}</td>
                    <td>{{ $transaction->transactionCategory->name}}</td>
                    <td>{{ $transaction->transactionCategory->transactionType->name }}</td>
                    <td>{{ $transaction->monto }}</td>
                    <td>
                        <form action="{{ route("transactions.destroy", $transaction)}}" method="post">
                            <a class="" href="{{ route("transactions.edit", $transaction->id)}}" title="Editar"><i class="fa-regular fa-pen-to-square">Edit</i></a>
                            <a class="" href="{{ route("transactions.show", $transaction->id)}}" title="ver"> <i class="fa fa-eye">Ver</i></a>
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn"  title="eliminar"><i class="fas fa-trash-alt">Eliminar</i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h6>Total Ingreso: ${{ $totalIngreso }}</h6>
    <h6>Total Egreso: ${{ $totalEgreso }}</h6>
    <h6>Neto Total: ${{ $netTotal }}</h6>
</div>
@endsection
