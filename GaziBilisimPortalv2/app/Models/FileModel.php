<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileModel extends Model
{
    use HasFactory;

    protected $table= 'files';

    protected $fillable=[
        'file_name',
        'file_path',
        'file_type'
    ];



    protected $casts=[
        'file_type' => 'array'
    ];



    public $timestamps = true;
}
