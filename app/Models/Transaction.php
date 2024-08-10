<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['monto', 'transaction_category_id', 'descripcion', 'fecha_transaccion'];

    public function transactionCategory()
    {
        return $this->belongsTo(TransactionCategory::class);
    }
}
