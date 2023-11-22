<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['category_id', 'name', 'description', 'price', 'thumb_img'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
