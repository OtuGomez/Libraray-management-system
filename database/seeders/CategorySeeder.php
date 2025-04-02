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
           ['name' => 'Science Fiction'],
           ['name' => 'Mystery & Thriller'],
           ['name' => 'Fantasy'],
           ['name' => 'Historical Fiction'],
           ['name' => 'Biography & Memoir'],
           ['name' => 'Self-Help'],
           ['name' => 'Romance'],
           ['name' => 'Horror'],
           ['name' => 'Children’s Books'],
           ['name' => 'Young Adult'],
           ['name' => 'Graphic Novels & Comics'],
           ['name' => 'Science & Technology'],
           ['name' => 'Business & Economics'],
           ['name' => 'Religion & Spirituality'],
           ['name' => 'Education & Learning'],
           ['name' => 'Poetry'],
           ['name' => 'Health & Wellness'],
           ['name' => 'Cooking & Food'],
           ['name' => 'Travel & Adventure'],
           ['name' => 'Philosophy'],
           ['name' => 'Art & Photography'],
           ['name' => 'True Crime'],
           ['name' => 'Politics & Government'],
           ['name' => 'Sports & Recreation'],
           ['name' => 'Music & Performing Arts'],
           ['name' => 'Parenting & Family'],
           ['name' => 'Environment & Nature'],
           ['name' => 'Short Stories'],
           ['name' => 'Psychology'],
           ['name' => 'Anthologies'],
            ['name' => 'Drama'],
            ['name' => 'Comedy'],
            ['name' => 'Tragedy'],
            ['name' => 'Novel '],
        ];

        // Insert data into the database
        Category::query()->insert($categories);
    }
}
