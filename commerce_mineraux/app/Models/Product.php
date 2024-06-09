<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'name',
        'price',
        'image_url',
        'details',
        'quantity_available',
        'main_category_id',
        'other_category_id'
    ];

    public function mainCategory()
    {
        return $this->belongsTo(Category::class, 'main_category_id', 'category_id');
    }

    public function otherCategory()
    {
        return $this->belongsTo(Category::class, 'other_category_id', 'category_id');
    }
}
