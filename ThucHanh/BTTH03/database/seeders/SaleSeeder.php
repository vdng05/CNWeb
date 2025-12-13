<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("sales")->insert([
            [
                'medicine_id' => 1, // Paracetamol
                'quantity' => 5,
                'sale_date' => '2025-12-01 10:30:00',
                'customer_phone' => '0901234567',
            ],
            [
                'medicine_id' => 2, // Amoxicillin
                'quantity' => 2,
                'sale_date' => '2025-12-02 14:15:00',
                'customer_phone' => '0912345678',
            ],
            [
                'medicine_id' => 1,
                'quantity' => 10,
                'sale_date' => '2025-12-05 09:00:00',
                'customer_phone' => '0914054210',
            ],
            [
                'medicine_id' => 3, // Vitamin C
                'quantity' => 3,
                'sale_date' => '2025-12-10 16:45:00',
                'customer_phone' => '0987654321',
            ],
            [
                'medicine_id' => 4,
                'quantity' => 1,
                'sale_date' => '2025-12-12 11:20:00',
                'customer_phone' => '0934567890',
            ]
        ]);
    }
}
