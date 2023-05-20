<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $productsName = [
            ['name' => 'Atlet Çanta', 'image_path' => '/images/products/atletCanta.jpg'],
            ['name' => 'Alttan Körüklü Çanta', 'image_path' => '/images/products/alttanKoruklu.jpg'],
            ['name' => 'Alttan ve Yandan Körüklü Çanta' , 'image_path' => '/images/products/alttanVeYandan.jpeg'],
            ['name' => 'El Geçmeli Çanta', 'image_path' => '/images/products/elGecmeliCanta.jpg'],
            ['name' => 'Düz Çanta', 'image_path' => '/images/products/duzCanta.jpg']
       ];



       foreach($productsName as $key => $value){
            Product::create($value);
       }
    }
}
