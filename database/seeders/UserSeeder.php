<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Cunamhouse',
            'email' => 'cunamhouse@gmail.com',
            'email_verified_at' => null,
            'password' =>  Hash::make('12345678'), // Đã mã hóa
            'remember_token' => null,
            'created_at' => Carbon::create(2024, 9, 10, 2, 30, 31),
            'updated_at' => Carbon::create(2024, 9, 10, 2, 30, 31),
        ]);
    }
}
