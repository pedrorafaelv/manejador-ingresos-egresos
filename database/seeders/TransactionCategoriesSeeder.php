<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaction_categories')->insert([
            ['name' => 'Salary', 'transaction_type_id' => 1],
            ['name' => 'Freelance', 'transaction_type_id' => 1],
            ['name' => 'Rent', 'transaction_type_id' => 2],
            ['name' => 'Groceries', 'transaction_type_id' => 2],
            ['name' => 'Utilities', 'transaction_type_id' => 2],
            ['name' => 'Investment', 'transaction_type_id' => 1],
            ['name' => 'Insurance', 'transaction_type_id' => 2],
        ]);
    }
}
