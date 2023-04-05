<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorktimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $start = Carbon::createFromTime(8, 0); // set start time to 8:00 AM
        $end = Carbon::createFromTime(21, 0); // set end time to 9:00 PM
        $interval = CarbonInterval::make('1hour');
        while ($start < $end) {
            $data = [
                                            
                'start_time' => $start->format('H:i'),
                'end_time' => $start->add($interval)->format('H:i')
                
            ];

            if($data['start_time'] == '12:00'){
                continue;
            }
            else{
                DB::table('worktimes')->insert($data);
            }
            
        }
    }
}
