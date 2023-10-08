<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/category.json');
        $categories = collect(json_decode($json, true));

        $categories->each(function($category){
            
            Category::create([
                'name'  => $category['name'],
                'slug'  => $category['slug'],
            ]);
        });
    }
}
