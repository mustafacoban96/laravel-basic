<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServeTypes extends Model
{
    use HasFactory;


    protected $table = 'servetypes';
    protected $fillable = [
        'name',
    ];
}
