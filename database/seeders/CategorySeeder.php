<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Mouses', 'Teclados', 'Monitores'];
        $imagesIds = ['2115256', '1309766', '5082554'];

        foreach ($categories as $category) {

            $imageId = array_shift($imagesIds);
            $image = file_get_contents('https://images.pexels.com/photos/' . $imageId . '/pexels-photo-' . $imageId . '.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            $filename = time() . $category . '.jpg';
            file_put_contents(public_path('storage/categories/' . $filename), $image);

            Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
                'description' => 'Descripcion de ' . $category,
                'path' => $filename,
            ]);
        }
    }
}
