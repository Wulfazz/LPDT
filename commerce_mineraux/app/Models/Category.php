<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id';

    protected $fillable = [
        'name',
        'description',
    ];

    // Relation avec les produits qui ont cette catégorie comme catégorie principale
    public function mainProducts()
    {
        return $this->hasMany(Product::class, 'main_category_id', 'category_id');
    }

    // Relation avec les produits qui ont cette catégorie comme autre catégorie
    public function otherProducts()
    {
        return $this->hasMany(Product::class, 'other_category_id', 'category_id');
    }
}
