<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'prod_name',
        'prod_price_now',
        'prod_rating',
        'prod_new',
        'prod_image_name'
        
    ];
}
