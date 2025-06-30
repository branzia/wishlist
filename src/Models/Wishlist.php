<?php

namespace Branzia\Wishlist\Models;

use Branzia\Wishlist\Models\WishlistItem;
use Branzia\Customer\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'name',
    ];

    /**
     * Relationship: Wishlist belongs to a customer.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Relationship: Wishlist has many items.
     */
    public function items()
    {
        return $this->hasMany(WishlistItem::class);
    }
}
