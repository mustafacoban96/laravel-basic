<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;


    protected $table = 'appointments';

    protected $fillable =[
        'employee_id',
        'worktime_id'
    ];




    public function AssignEmployeeToAppointmentTable()
    {
        return $this->belongsTo(User::class)->where('role', 2);
    }

    
    public function AssignWorkTimeToAppoinmentTable(){
        return $this->belongsTo(Worktime::class);
    }

    public function appointmentStatus(){
        return $this->hasMany(AppointmentStatus::class);
    }
}
