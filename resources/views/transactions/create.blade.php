@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Transaction</h1>
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="description">Descripci&oacute;n</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
        </div>
        <div class="form-group">
            <label for="amount">Monto</label>
            <input type="number" class="form-control" id="monto" name="monto" required>
        </div>
        <div class="form-group">
            <label for="category">Categoria</label>
            <select class="form-control" id="transaction_category_id" name="transaction_category_id" required>
                @foreach ($categories as $id=> $category)
                <option value="{{$id}}">{{$category}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Transaction</button>
    </form>
</div>
@endsection
