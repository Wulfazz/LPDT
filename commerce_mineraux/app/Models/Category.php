<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_name',
        'type',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'productcategories', 'category_id', 'product_id');
    }
}
