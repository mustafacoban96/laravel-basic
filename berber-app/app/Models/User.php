<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role'
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function employeeToAppointment(){
        return $this->hasMany(Appointment::class);
    }





    public function addWorkTimeToNewEmployee($id){
        // $start = Carbon::createFromTime(8, 0); // set start time to 8:00 AM
        // $end = Carbon::createFromTime(21, 0); // set end time to 9:00 PM
        // $interval = CarbonInterval::make('1hour');
        // while ($start < $end) {
        //     $data = [
        //         'employee_id' => $id,                           
        //         'start_time' => $start->format('H:i'),
        //         'end_time' => $start->add($interval)->format('H:i')
                
        //     ];

        //     if($data['start_time'] == '12:00'){
        //         continue;
        //     }
        //     else{
        //         DB::table('appointments')->insert($data);
        //     }
            
        
        // }
        $workTimes = Worktime::all();
            for($j = 0; $j<count($workTimes);$j++){
                $data = [
                    'employee_id' => $id,                           
                    'worktime_id' => $workTimes[$j]->id,
                    
                ];
                DB::table('appointments')->insert($data);
            }
        

    }

}
