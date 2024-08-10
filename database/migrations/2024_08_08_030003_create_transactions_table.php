<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_category_id')->constrained('transaction_categories')->onDelete('cascade');
            $table->decimal('monto', 15, 2); // Monto de la transaccion
            $table->text('descripcion')->nullable(); // Descripcion de la transaccion
            $table->date('fecha_transaccion'); // Fecha de la transaccion
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
