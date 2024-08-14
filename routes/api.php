<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\TransactionCategoryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sa33333333nctum')->get('/user', function (Request $request) {
//     return $request->user();s
// });



Route::prefix('TransactionsCategory')->group(function () {
    Route::get('/', [TransactionCategoryController::class, 'index']);  // Listar todas las transacciones
    Route::get('/{id}', [TransactionCategoryController::class, 'show']); // Mostrar una transacción específica
    Route::post('/', [TransactionCategoryController::class, 'store']);  // Crear una nueva transacción
    Route::put('/{id}', [TransactionCategoryController::class, 'update']);  // Actualizar una transacción existente
    Route::delete('/{id}', [TransactionCategoryController::class, 'destroy']);  // Eliminar una transacción
});

Route::get('/Transactions/resumen/', [TransactionController::class, 'getResumenPorFecha']);
// /api/Transactions/summary?start_date=2024-08-01&end_date=2024-08-31

Route::prefix('Transactions')->group(function () {
    Route::get('/', [TransactionController::class, 'index']);  // Listar todas las transacciones
    Route::get('/{id}', [TransactionController::class, 'show']); // Mostrar una transacción específica
    Route::post('/', [TransactionController::class, 'store']);  // Crear una nueva transacción
    Route::put('/{id}', [TransactionController::class, 'update']);  // Actualizar una transacción existente
    Route::delete('/{id}', [TransactionController::class, 'destroy']);  // Eliminar una transacción
});


// Route::get('Transaction/', [TransactionController::class, 'index']);

/** Cualquier otra ruta que no esté definida */
// Route::fallback(function () {
//     return response()->json(['message' => 'Ruta no encontrada'], Response::HTTP_NOT_FOUND);
// });
