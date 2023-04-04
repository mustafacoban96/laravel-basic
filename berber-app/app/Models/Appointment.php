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
        'start_time',
        'end_time'
    ];




    public function AssignEmployeeToAppointmentTable()
    {
        return $this->belongsTo(User::class)->where('role', 2);
    }
}
