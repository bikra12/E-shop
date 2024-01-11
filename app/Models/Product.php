<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'subcategory_id',
        'name',
        'slug', // Add 'slug' to the list
        'description',
        'original_price',
        'selling_price',
        'image',
        'tax',
        'qty',
        'status',
        'trending',

        // ... other columns ...
    ];

    public function subcategories()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function stocks()
    {
        return $this->hasMany(ProductStock::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
