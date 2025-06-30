<?php

namespace Branzia\Wishlist\Models;


use Branzia\Wishlist\Models\Wishlist;
use Branzia\Catalog\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WishlistItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'wishlist_id',
        'product_id',
    ];

    /**
     * Relationship: WishlistItem belongs to a wishlist.
     */
    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class);
    }

    /**
     * Relationship: WishlistItem belongs to a product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
