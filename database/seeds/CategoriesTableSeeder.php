<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Category::create([
            'name' => 'Blog',
            'slug' => 'blog',
        ]);
        Category::create([
            'name' => 'Penmanship',
            'slug' => 'penmanship',
        ]);
        Category::create([
            'name' => 'Book Exhibition',
            'slug' => 'book_exhibition',
        ]);
        Category::create([
            'name' => 'Event',
            'slug' => 'event',
        ]);
    }
}
