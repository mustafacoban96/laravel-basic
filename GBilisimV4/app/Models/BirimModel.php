<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BirimModel extends Model
{
    use HasFactory;


    protected $table = 'birimler';

    protected $fillable = [
        'name',
        'isyeri_type'
    ];
}
