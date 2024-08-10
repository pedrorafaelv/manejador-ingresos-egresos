<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Transaction::factory()->count(50)->create();
        DB::table('transactions')->insert([
            ['monto' => '5', 'transaction_category_id' => 1, 'descripcion'=>'descripciones', 'fecha_transaccion'=>now()],
            ['monto' => '5', 'transaction_category_id' => 2, 'descripcion'=>'descripciones', 'fecha_transaccion'=>now()],
            ['monto' => '5', 'transaction_category_id' => 3, 'descripcion'=>'descripciones', 'fecha_transaccion'=>now()],
            ['monto' => '5', 'transaction_category_id' => 4, 'descripcion'=>'descripciones', 'fecha_transaccion'=>now()],
            ['monto' => '5', 'transaction_category_id' => 5, 'descripcion'=>'descripciones', 'fecha_transaccion'=>now()],
            ['monto' => '5', 'transaction_category_id' => 6, 'descripcion'=>'descripciones', 'fecha_transaccion'=>now()],
            ['monto' => '5', 'transaction_category_id' => 7, 'descripcion'=>'descripciones', 'fecha_transaccion'=>now()],
        ]);
    }
}
