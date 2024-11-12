<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('headers')->insert([
            'id' => 1,
            'title1' => 'Limited Time: 30% off entire store with code 12345opening',
            'created_at' => Carbon::create(2024, 10, 24, 15, 30, 21),
            'updated_at' => Carbon::create(2024, 11, 5, 7, 13, 51),
        ]);
    }
}
