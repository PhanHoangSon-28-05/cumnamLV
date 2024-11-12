<?php

namespace Database\Seeders;

use App\Models\Footer;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('footers')->insert([
            'id' => 1,
            'title1' => 'SUPPORT',
            'content11' => 'REFUND & EXCHANGE',
            'content12' => 'WARRANTY',
            'content13' => 'HOW TO MEASURE',
            'content14' => 'HOW TO INSTALL',
            'title2' => 'CONNECT WITH US',
            'content21' => '',
            'content22' => '',
            'content23' => '',
            'title3' => 'SUBSCRIBE',
            'content31' => 'Sign up for our newsletter to receive 10%​Off* on your first order & get updates on ​promotions, lifestyle guides, and more!',
            'created_at' => Carbon::create(2024, 10, 24, 15, 31, 37),
            'updated_at' => Carbon::create(2024, 11, 5, 7, 19, 51),
        ]);
    }
}
