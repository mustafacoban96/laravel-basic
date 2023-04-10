<?php

namespace Database\Seeders;

use App\Models\ServeTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServeTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serves = [
            ['name' => 'Sakal Kesimi'],
            ['name' => 'Sac Kesimi'],
            ['name' => 'Cilt Bakimi'],
            ['name' => 'Boya'],
            ['name' => 'Fon']
        ];


        foreach($serves as $key => $value){
            ServeTypes::create($value);
        }
    }
}
