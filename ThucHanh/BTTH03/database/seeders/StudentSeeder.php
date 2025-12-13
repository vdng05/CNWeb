<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("students")->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'date_of_birth' => '2018-05-15',
                'parent_phone' => '0901234567',
                'class_id' => 1,
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'date_of_birth' => '2019-08-22',
                'parent_phone' => '0912345678',
                'class_id' => 2,
            ],
            [
                'first_name' => 'Alice',
                'last_name' => 'Johnson',
                'date_of_birth' => '2018-11-30',
                'parent_phone' => '0923456789',
                'class_id' => 1,
            ],
            [
                'first_name' => 'Bob',
                'last_name' => 'Brown',
                'date_of_birth' => '2019-03-10',
                'parent_phone' => '0934567890',
                'class_id' => 2,
            ],
        ]);
    }
}
