<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
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
            ['id' => 1, 'stt' => 1, 'parent_id' => 0, 'name' => 'shades', 'slug' => 'shades', 'description' => null, 'created_at' => Carbon::create(2024, 10, 20, 2, 20, 25), 'updated_at' => Carbon::create(2024, 10, 20, 2, 20, 25)],
            ['id' => 2, 'stt' => 2, 'parent_id' => 0, 'name' => 'blinds', 'slug' => 'blinds', 'description' => null, 'created_at' => Carbon::create(2024, 10, 20, 2, 20, 25), 'updated_at' => Carbon::create(2024, 10, 20, 2, 20, 25)],
            ['id' => 3, 'stt' => 3, 'parent_id' => 0, 'name' => 'drapery', 'slug' => 'drapery', 'description' => null, 'created_at' => Carbon::create(2024, 10, 20, 2, 20, 25), 'updated_at' => Carbon::create(2024, 10, 20, 2, 20, 25)],
            ['id' => 4, 'stt' => 4, 'parent_id' => 0, 'name' => 'How to', 'slug' => 'how-to', 'description' => null, 'created_at' => Carbon::create(2024, 10, 20, 2, 20, 25), 'updated_at' => Carbon::create(2024, 10, 20, 2, 20, 25)],
            ['id' => 5, 'stt' => 5, 'parent_id' => 0, 'name' => 'about us', 'slug' => 'about-us', 'description' => null, 'created_at' => Carbon::create(2024, 10, 20, 2, 20, 25), 'updated_at' => Carbon::create(2024, 10, 20, 2, 20, 25)],
            ['id' => 6, 'stt' => 1, 'parent_id' => 1, 'name' => 'Horizontal Sheer', 'slug' => 'horizontal-sheer', 'description' => 'Zebra Roller Shades combine alternating sheer and solid bands in a single shade. Shift the solid bands to overlap, and you ensure privacy. Align the solid bands, and you get natural, diffused light. With each adjustment, you create your precise level of sun and privacy.', 'created_at' => Carbon::create(2024, 10, 21, 2, 8, 53), 'updated_at' => Carbon::create(2024, 11, 6, 18, 35, 17)],
            ['id' => 7, 'stt' => 2, 'parent_id' => 1, 'name' => 'Vertical Sheer', 'slug' => 'vertical-sheer', 'description' => null, 'created_at' => Carbon::create(2024, 10, 21, 2, 9, 46), 'updated_at' => Carbon::create(2024, 10, 21, 2, 9, 46)],
            ['id' => 8, 'stt' => 3, 'parent_id' => 1, 'name' => 'Cellular', 'slug' => 'cellular', 'description' => null, 'created_at' => Carbon::create(2024, 10, 21, 2, 11, 35), 'updated_at' => Carbon::create(2024, 10, 21, 2, 11, 35)],
            ['id' => 9, 'stt' => 4, 'parent_id' => 1, 'name' => 'Roller', 'slug' => 'roller', 'description' => null, 'created_at' => Carbon::create(2024, 10, 21, 2, 16, 14), 'updated_at' => Carbon::create(2024, 10, 21, 2, 16, 14)],
            ['id' => 10, 'stt' => 5, 'parent_id' => 1, 'name' => 'Roman', 'slug' => 'roman', 'description' => null, 'created_at' => Carbon::create(2024, 10, 21, 2, 16, 48), 'updated_at' => Carbon::create(2024, 10, 21, 2, 16, 48)],
            ['id' => 11, 'stt' => 6, 'parent_id' => 1, 'name' => 'Combi Roman', 'slug' => 'combi-roman', 'description' => null, 'created_at' => Carbon::create(2024, 10, 21, 2, 18, 26), 'updated_at' => Carbon::create(2024, 10, 21, 2, 18, 26)],
            ['id' => 12, 'stt' => 1, 'parent_id' => 2, 'name' => 'Wood', 'slug' => 'wood', 'description' => null, 'created_at' => Carbon::create(2024, 10, 21, 2, 19, 23), 'updated_at' => Carbon::create(2024, 10, 21, 2, 19, 23)],
            ['id' => 13, 'stt' => 2, 'parent_id' => 2, 'name' => 'Metal', 'slug' => 'metal', 'description' => null, 'created_at' => Carbon::create(2024, 10, 21, 2, 19, 33), 'updated_at' => Carbon::create(2024, 10, 21, 2, 19, 33)],
            ['id' => 14, 'stt' => 1, 'parent_id' => 3, 'name' => 'Sheer', 'slug' => 'sheer', 'description' => null, 'created_at' => Carbon::create(2024, 10, 21, 2, 19, 51), 'updated_at' => Carbon::create(2024, 10, 21, 2, 19, 51)],
            ['id' => 15, 'stt' => 2, 'parent_id' => 3, 'name' => 'Custom', 'slug' => 'custom', 'description' => null, 'created_at' => Carbon::create(2024, 10, 21, 2, 20, 2), 'updated_at' => Carbon::create(2024, 10, 21, 2, 20, 2)],
            ['id' => 16, 'stt' => 3, 'parent_id' => 3, 'name' => 'Woven', 'slug' => 'woven', 'description' => null, 'created_at' => Carbon::create(2024, 10, 21, 2, 20, 10), 'updated_at' => Carbon::create(2024, 10, 21, 2, 20, 10)],
            ['id' => 17, 'stt' => 1, 'parent_id' => 5, 'name' => 'Action', 'slug' => 'action', 'description' => null, 'created_at' => Carbon::create(2024, 10, 21, 2, 20, 27), 'updated_at' => Carbon::create(2024, 10, 21, 2, 20, 27)],
            ['id' => 18, 'stt' => 2, 'parent_id' => 5, 'name' => 'Another action', 'slug' => 'another-action', 'description' => null, 'created_at' => Carbon::create(2024, 10, 21, 2, 20, 39), 'updated_at' => Carbon::create(2024, 10, 21, 2, 20, 39)],
            ['id' => 19, 'stt' => 3, 'parent_id' => 5, 'name' => 'Something else here', 'slug' => 'something-else-here', 'description' => null, 'created_at' => Carbon::create(2024, 10, 21, 2, 20, 51), 'updated_at' => Carbon::create(2024, 10, 21, 2, 20, 51)]
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate($category);
        }
    }
}
