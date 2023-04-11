<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;


    protected $table = 'history';

    protected $fillable =[
        'employee_id',
        'customer_info',
        'start_time',
        'serves'
    ];


    protected $casts = [
        'customer_info' => 'array',
        'serves' => 'array'
    ];
}
