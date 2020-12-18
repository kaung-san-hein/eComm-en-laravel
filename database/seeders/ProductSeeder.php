<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = array(
            array(
                'name' => 'LG W30 | Triple AI Camera',
                'price' => '200.00',
                'description' => 'Capture the best moments of your life with all new LG W10 Smartphone featuring Dual AI camera that delivers unparalleled sharpness, colour accuracy.',
                'category' => 'mobile',
                'gallery' => 'https://www.lg.com/in/images/mobile-phones/md06155757/gallery/Platinum_07-1100-V3.jpg',
            ),
            array(
                'name' => 'Oppo mobile',
                "price" => "300",
                "description" => "A smartphone with 8gb ram and much more feature",
                "category" => "mobile",
                "gallery" => "https://assetscdn1.paytm.com/images/catalog/product/M/MO/MOBOPPO-A52-6-GFUTU6297453D3D253C/1592019058170_0..png"

            ),
            array(
                'name' => 'Panasonic Tv',
                "price" => "400",
                "description" => "A smart tv with much more feature",
                "category" => "tv",
                "gallery" => "https://i.gadgets360cdn.com/products/televisions/large/1548154685_832_panasonic_32-inch-lcd-full-hd-tv-th-l32u20.jpg"
            ),
            array(
                'name' => 'Soni Tv',
                "price" => "500",
                "description" => "A tv with much more feature",
                "category" => "tv",
                "gallery" => "https://4.imimg.com/data4/PM/KH/MY-34794816/lcd-500x500.png"
            ),
            array(
                'name' => 'LG fridge',
                "price" => "200",
                "description" => "A fridge with much more feature",
                "category" => "fridge",
                "gallery" => "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTFx-2-wTOcfr5at01ojZWduXEm5cZ-sRYPJA&usqp=CAU"
            ),

        );

        foreach ($products as $value) {
            Product::create([
                'name' => $value['name'],
                'price' => $value['price'],
                'description' => $value['description'],
                'category' => $value['category'],
                'gallery' => $value['gallery'],
            ]);
        }
    }
}
