<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'id' => 1,
                'stt' => 1,
                'parent_id' => 0,
                'name' => 'shades',
                'slug' => 'shades'
            ],
            [
                'id' => 2,
                'stt' => 2,
                'parent_id' => 0,
                'name' => 'blinds',
                'slug' => 'blinds'
            ],
            [
                'id' => 3,
                'stt' => 3,
                'parent_id' => 0,
                'name' => 'drapery',
                'slug' => 'drapery'
            ],
            [
                'id' => 4,
                'stt' => 4,
                'parent_id' => 0,
                'name' => 'How to',
                'slug' => 'how-to'
            ],
            [
                'id' => 5,
                'stt' => 5,
                'parent_id' => 0,
                'name' => 'about us',
                'slug' => 'abou-us'
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate($category);
        }
    }
}
