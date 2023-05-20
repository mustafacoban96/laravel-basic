<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $table = 'product_detail';
    protected $fillable = [
        'product_id',
        'product_description',
        'width',
        'height',
        'gusset'
    ];


    public function productDetail(){

        return $this->belongsTo(Product::class);
    }
}





