<?php

namespace Database\Seeders;

use App\Models\ProductDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productDetailSeed = [
            [
                'product_id' => 1,
                'product_description' =>'W-Cut Ultrasonik Çanta',
                'width' => '35 cm',
                'height' => '50 cm',
                'gusset' => '10+10 cm',
            ],

            [
                'product_id' => 2,
                'product_description' =>'Kulplu Alttan Körüklü Ultrasonik Çanta',
                'width' => '25 cm',
                'height' => '30 cm',
                'gusset'=> '4+4 cm',
            ],
            [
                'product_id' => 3,
                'product_description' => 'Kulplu Alttan ve Yandan Körüklü Ultrasonik Çanta' ,
                'width' => '30 cm',
                'height' => '30 cm',
                'gusset' => '10+10 cm',
            ],

            [
                'product_id' => 4,
                'product_description' => 'El Geçmeli Alttan Körüklü Laminasyonlu Ultrasonik Çanta',
                'width' => '50 cm',
                'height' => '33 cm',
                'gusset' => '8+8',
            ],

            [
                'product_id' => 5,
                'product_description' => 'Kulplu Kutu Ultrasonik Çanta',
                'width' => '43 cm',
                'height' => '37 cm',
                'gusset' => '7+7 cm',
            ],

        ];

        foreach($productDetailSeed as $key => $value){
            ProductDetail::create($value);
       }

    }
}
