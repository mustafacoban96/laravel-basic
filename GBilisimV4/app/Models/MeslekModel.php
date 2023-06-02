<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeslekModel extends Model
{
    use HasFactory;


    protected $table = 'meslekler';

    protected $fillable = [
        'name'
    ];
}
