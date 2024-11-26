<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $mouses = ['Genius DX-110', 'LOGITECH G305'];
        $firstMousesImagesIds = ['f9225cf3a3510d0025978be0fcddf924', 'dd57ce1bb3da5f2730c922d8af879146', '812e13668340c2d798f3b763647051d2'];
        $secondMousesImagesIds = ['746769-MEC45893345200_052021-O', '2X_867333-MEC48466307235_122021-F'];

        foreach ($mouses as $mouse) {

            $product = Product::create([
                'name' => $mouse,
                'description' => 'Descripción del mouse ' . $mouse,
                'slug' => Str::slug($mouse),
                'price' => rand(15000, 50000),
                'code' => rand(1000000, 9999999),
                'category_id' => 1
            ]);

            $product->inventory()->create([
                'quantity' => 20,
                'min_quantity' => 5,
                'max_quantity' => 50,
                'storage_location' => 'N/A'
            ]);

            if ($mouse === 'Genius DX-110') {
                foreach ($firstMousesImagesIds as $imageId) {
                    $image = file_get_contents('https://images.fravega.com/f500/' . $imageId . '.jpg');
                    $filename = uniqid() . $mouse . '.jpg';
                    file_put_contents(public_path('storage/products/' . $filename), $image);
    
                    $product->images()->create([
                        'path' => $filename
                    ]);
                }
            } else {
                foreach ($secondMousesImagesIds as $imageId) {
                    $image = file_get_contents('https://http2.mlstatic.com/D_NQ_NP_' . $imageId . '.webp');
                    $filename = uniqid() . $mouse . '.jpg';
                    file_put_contents(public_path('storage/products/' . $filename), $image);
    
                    $product->images()->create([
                        'path' => $filename
                    ]);
                }
            }            
        }

        $keyboards = ['Marvo Kg962 Rainbow', 'Redragon K552'];
        $firstKeyboardsImagesIds = ['11122', '11123'];
        $secondKeyboardsImagesIds = ['969843-MLU75183480618_032024', '824581-MLA52350579847_112022'];

        foreach ($keyboards as $keyboard){
            $product = Product::create([
                'name' => $keyboard,
                'description' => 'Descripción del teclado ' . $keyboard,
                'slug' => Str::slug($keyboard),
                'price' => rand(15000, 50000),
                'code' => rand(1000000, 9999999),
                'category_id' => 2
            ]);

            $product->inventory()->create([
                'quantity' => 20,
                'min_quantity' => 5,
                'max_quantity' => 50,
                'storage_location' => 'N/A'
            ]);

            if ($keyboard === 'Marvo Kg962 Rainbow') {
                foreach ($firstKeyboardsImagesIds as $imageId) {
                    $image = file_get_contents('https://www.ecelectronica.com.ar/' . $imageId . '-large_default/teclado-mecanico-marvo-kg962-rainbow-60-switch-blue-usb-61-teclas.jpg');
                    $filename = uniqid() . $keyboard . '.jpg';
                    file_put_contents(public_path('storage/products/' . $filename), $image);
    
                    $product->images()->create([
                        'path' => $filename
                    ]);
                }
            } else {
                foreach ($secondKeyboardsImagesIds as $imageId) {
                    $image = file_get_contents('https://http2.mlstatic.com/D_NQ_NP_2X_' . $imageId . '-F.webp');
                    $filename = uniqid() . $keyboard . '.jpg';
                    file_put_contents(public_path('storage/products/' . $filename), $image);
    
                    $product->images()->create([
                        'path' => $filename
                    ]);
                }
            }
        }

        $monitors = ['LG 24MK430H-B', 'Samsung LF22T350FHL'];
        $firstMonitorsImagesIds = ['734638-MLA78705428319', '844308-MLA78473160650'];
        $secondMonitorsImagesIds = ['843829-MLU72646996287_112023', '866008-MLU74831747838_032024'];

        foreach ($monitors as $monitor){
            $product = Product::create([
                'name' => $monitor,
                'description' => 'Descripción del monitor ' . $monitor,
                'slug' => Str::slug($monitor),
                'price' => rand(125000, 250000),
                'code' => rand(1000000, 9999999),
                'category_id' => 3
            ]);

            $product->inventory()->create([
                'quantity' => 20,
                'min_quantity' => 5,
                'max_quantity' => 50,
                'storage_location' => 'N/A'
            ]);

            if ($monitor === 'LG 24MK430H-B') {
                foreach ($firstMonitorsImagesIds as $imageId) {
                    $image = file_get_contents('https://http2.mlstatic.com/D_NQ_NP_' . $imageId . '_082024-O.webp');
                    $filename = uniqid() . $monitor . '.jpg';
                    file_put_contents(public_path('storage/products/' . $filename), $image);

                    $product->images()->create([
                        'path' => $filename
                    ]);
                }
            } else {
                foreach ($secondMonitorsImagesIds as $imageId) {
                    $image = file_get_contents('https://http2.mlstatic.com/D_NQ_NP_' . $imageId . '-O.webp');
                    $filename = uniqid() . $monitor . '.jpg';
                    file_put_contents(public_path('storage/products/' . $filename), $image);

                    $product->images()->create([
                        'path' => $filename
                    ]);
                }
            }
        }
    }
}
