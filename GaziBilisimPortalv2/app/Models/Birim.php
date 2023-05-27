<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Birim extends Model
{
    use HasFactory;


    protected $table = 'birimler';

    protected $fillable = [
        'name',
        'is_yeri_type'
    ];

    
}
