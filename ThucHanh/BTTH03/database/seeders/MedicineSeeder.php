<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table("medicines")->insert([
            [
                'name' => 'Paracetamol',
                'brand' => 'Panadol',
                'dosage' => '500mg',
                'form' => 'Viên nén',
                'price' => 25000.00,
                'stock' => 200,
            ],
            [
                'name' => 'Amoxicillin',
                'brand' => 'Himox',
                'dosage' => '500mg',
                'form' => 'Viên nang',
                'price' => 45000.00,
                'stock' => 150,
            ],
            [
                'name' => 'Vitamin C',
                'brand' => 'Redoxon',
                'dosage' => '1000mg',
                'form' => 'Viên sủi',
                'price' => 80000.00,
                'stock' => 300,
            ],
            [
                'name' => 'Omeprazole',
                'brand' => 'Omez',
                'dosage' => '20mg',
                'form' => 'Viên nang',
                'price' => 35000.00,
                'stock' => 100,
            ],
            [
                'name' => 'Aspirin',
                'brand' => 'Bayer',
                'dosage' => '81mg',
                'form' => 'Viên nén',
                'price' => 50000.00,
                'stock' => 80,
            ]
        ]);
    }
}
