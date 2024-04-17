<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    
    protected $fillable = [
    'product_title',
    'product_description',
    'product_cat',
    'product_link_url',
    'product_price',
    'product_image'
    ];
}
