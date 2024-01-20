<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencyNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Вставляем данные в таблицу currency_name
        DB::table('currency_name')->insert([
            ['currency_code' => 'USD'],
            ['currency_code' => 'EUR'],
            ['currency_code' => 'AED'],
            ['currency_code' => 'RUB'],
        ]);
    }
}
