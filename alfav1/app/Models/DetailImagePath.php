<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailImagePath extends Model
{
    use HasFactory;


    protected $table = 'product_detail_image';

    protected $fillable = [
        'product_id',
        'd_image_path',
    ];

    protected $casts =[
      'd_image_path' => 'array',
    ];


    public function DetailImageProductId(){
      return $this->belongsTo(Product::class);
    }

}
