<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worktime extends Model
{
    use HasFactory;


    protected $table = 'worktimes';

    protected $fillable = [
        'start_time',
        'end_time'
    ];







    public function worktimeToAppointment(){
        return $this->hasMany(Appointment::class);
    }
}
