<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'transaction_type_id'];

    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class);
    }
}
