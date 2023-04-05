<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Worktime;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = User::where('role',2)->get();
        $workTimes = Worktime::all();
        for($i = 0 ; $i<count($employees); $i++){
            for($j = 0; $j<count($workTimes);$j++){
                $data = [
                    'employee_id' => $employees[$i]->id,                           
                    'worktime_id' => $workTimes[$j]->id,
                    
                ];
                DB::table('appointments')->insert($data);
            }
        }
    }
}
