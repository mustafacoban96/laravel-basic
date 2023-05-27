<?php

namespace Database\Seeders;

use App\Models\Birim;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BirimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $birimIDSeed = [
            [
                'name' => 'A departmanı',
                'is_yeri_type' => 'BELEDİYE',
            ],
            [
                'name' => 'B departmanı',
                'is_yeri_type' => 'GASKİ',
            ],
            [
                'name' => 'C departmanı',
                'is_yeri_type' => 'ŞUBE',
            ]
            
            
        ];


        foreach($birimIDSeed as $key => $value){
            Birim::create($value);
       }
    }
}
