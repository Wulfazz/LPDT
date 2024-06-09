<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_name',
        'created_at',
        'updated_at',
    ];

    public function mainProducts()
    {
        return $this->hasMany(Product::class, 'main_category_id', 'category_id');
    }

    public function otherProducts()
    {
        return $this->hasMany(Product::class, 'other_category_id', 'category_id');
    }
}
