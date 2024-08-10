<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionCategory;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        $totalIngreso = Transaction::join('transaction_categories', 'transactions.transaction_category_id', '=', 'transaction_categories.id')
            ->join('transaction_types', 'transaction_types.id', '=', 'transaction_categories.transaction_type_id')
            ->where('transaction_types.id', 1)
            ->sum('transactions.monto');
        $totalEgreso = Transaction::join('transaction_categories', 'transactions.transaction_category_id', '=', 'transaction_categories.id')
            ->join('transaction_types', 'transaction_types.id', '=', 'transaction_categories.transaction_type_id')
            ->where('transaction_types.id', 2)
            ->sum('transactions.monto');
        $netTotal = $totalIngreso - $totalEgreso;
        return view('transactions.index', compact('transactions', 'totalIngreso', 'totalEgreso', 'netTotal'));
    }

    public function create()
    {

        $categories = TransactionCategory::pluck('name', 'id')->toArray();


        return view('transactions.create', compact ('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'monto' => 'required|numeric',
            'transaction_category_id' => 'required|numeric',
        ]);

        $exito = Transaction::create($request->all());
        if (!$exito){
            return false;
        }

        return redirect()->route('transactions.index')->with('status', 'Transaction creada satisfactoriamente.');
    }

    public function edit( transaction $transaction ){

        $TransactionCategories = TransactionCategory::pluck('name', 'id')->toArray();

        return view('transactions.edit', compact ('TransactionCategories', 'transaction'));
    }

    public function update(Request $request ,Transaction $transaction){

        $transaction->update();
                //  dd($request->all());


        return redirect()->route('transactions.show', compact ('transaction'))->with('status', 'transaction actualizada');
    }

     public function show( Transaction $transaction){

        return view('transactions.show', compact('transaction'));

     }

     public function destroy(Transaction $transaction){
        $transaction->delete();
        return redirect()->route('transactions.index')->with('status', 'Transaccion Eliminada');

     }
}
