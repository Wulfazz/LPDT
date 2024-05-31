<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'name', 'price', 'details', 'image_url', 'quantity_available'
    ];

    protected $casts = [
        'details' => 'array',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'productcategories', 'product_id', 'category_id');
    }
}
