<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentStatus extends Model
{
    use HasFactory;



    protected $table = 'appointment_status';


    protected $fillable =[
        'appointment_id',
        'customer_id',
        'status',
        'serves'
    ];

    protected $casts =[
        'serves' => 'array',
    ];


    public function appointmentID(){
        return $this->belongsTo(Appointment::class);
    }
    public function customerID(){
        return $this->belongsTo(User::class);
    }












}
