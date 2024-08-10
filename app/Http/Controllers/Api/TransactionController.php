<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Listar todas las transacciones
    public function index()
    {
        return Transaction::all();
    }

    // Mostrar una transacción específica
    public function show($id)
    {
        return Transaction::findOrFail($id);
    }

    // Crear una nueva transacción
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'monto' => 'required|numeric',
            'transaction_category_id' => 'required|exists:transaction_categories,id',
            'descripcion' => 'nullable|string',
            'fecha_transaccion' => 'required|date',
        ]);

        $transaction = Transaction::create($validatedData);

        return response()->json($transaction, 201); // 201: Created
    }

    // Actualizar una transacción existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'monto' => 'required|numeric',
            'transaction_category_id' => 'required|exists:transaction_categories,id',
            'descripcion' => 'nullable|string',
            'fecha_transaccion' => 'required|date',
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->update($validatedData);

        return response()->json($transaction, 200); // 200: OK
    }

    // Eliminar una transacción
    public function destroy($id)
    {
        Transaction::destroy($id);
        return response()->json(null, 204); // 204: No Content
    }

    /**
     * Obtener un resumen de las transacciones entre dos fechas.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getResumenPorFecha(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // return response()->json(['message'=>'getResumenporFecha ']);

        // Obtener las fechas de inicio y fin
        $startDate = $validatedData['start_date'];
        $endDate = $validatedData['end_date'];
        $transactions = Transaction::whereBetween('fecha_transaccion', [$startDate, $endDate])->get();

        // Calcular el total de ingresos, egresos y el balance neto
        $totalIncome = $transactions->where('TransactionCategory.TransactionType.name', 'Ingreso')->sum('monto');
        $totalExpense = $transactions->where('TransactionCategory.TransactionType.name', 'Egreso')->sum('monto');
        $netBalance = $totalIncome - $totalExpense;

        // Retornar el resumen en formato JSON
        return response()->json([
            'total_ingreso' => $totalIncome,
            'total_egreso' => $totalExpense,
            'balance_neto' => $netBalance,
            'cantidad_transactiones' => $transactions->count(),
            'transactions' => $transactions,
        ]);

    }
}
