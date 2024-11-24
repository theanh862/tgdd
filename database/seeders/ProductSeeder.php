<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'iPhone 13',
            'price' => 15000000,
            'category' => 'dienthoai',
            'image' => 'iphone13.png',
        ]);

        Product::create([
            'name' => 'Laptop Dell XPS 13',
            'price' => 30000000,
            'category' => 'laptop',
            'image' => 'dellxps13.png',
        ]);

        Product::create([
            'name' => 'Tai nghe Sony WH-1000XM4',
            'price' => 5000000,
            'category' => 'phukien',
            'image' => 'sonywh1000xm4.png',
        ]);

        // Thêm các sản phẩm khác nếu cần
    }
}
