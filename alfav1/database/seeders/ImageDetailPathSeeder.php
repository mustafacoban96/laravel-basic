<?php

namespace Database\Seeders;

use App\Models\DetailImagePath;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageDetailPathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $img_details_paths =[
            [
                'product_id' => 1,
                'd_image_path' => ['/images/atlet_canta/atletCanta1.png',
                                    '/images/atlet_canta/atletCanta2.png',
                                    '/images/atlet_canta/atletCanta3.png']
            ],
            [
                'product_id' => 2,
                'd_image_path' => ['/images/alttan_koruklu/AlttanKoruklu1.jpg',
                                    '/images/alttan_koruklu/AlttanKoruklu2.jpg',
                                    '/images/alttan_koruklu/AlttanKoruklu3.jpg']
            ],
            [
                'product_id' => 3,
                'd_image_path' => ['/images/alttan_yandan/alttanveYandan1.jpg',
                                    '/images/alttan_yandan/alttanveYandan2.jpg',
                                    '/images/alttan_yandan/alttanveYandan3.jpg']
            ],
            [
                'product_id' => 4,
                'd_image_path' => ['/images/el_gecmeli/elGecmeli1.jpg',
                                    '/images/el_gecmeli/elGecmeli2.jpg',
                                    '/images/el_gecmeli/elGecmeli3.jpg']
            ],
            [
                'product_id' => 5,
                'd_image_path' => ['/images/duz_canta/duzBez1.jpg',
                                    '/images/duz_canta/duzBez2.jpg',
                                    '/images/duz_canta/duzBez3.jpg']
            ]
            
        ];
    

        foreach($img_details_paths as $key => $value){
            DetailImagePath::create($value);
        }
    }

}
