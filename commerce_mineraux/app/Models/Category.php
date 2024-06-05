<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id'; // Définir la clé primaire

    protected $fillable = [
        'category_name', 'type'
    ];
}
