<?php

namespace Branzia\Wishlist;
use Illuminate\Support\Facades\File;
use Branzia\Customer\Models\Customer;
use Branzia\Wishlist\Models\Wishlist;
use Branzia\Blueprint\BranziaServiceProvider;
use Branzia\Customer\Filament\Resources\CustomerResource;
use Branzia\Bootstrap\Resource\ResourcePageExtensionManager;
use Branzia\Bootstrap\Resource\ResourceNavigationItemsManager;
use Branzia\Wishlist\Filament\Resources\CustomerResource\Pages\CustomerWishlist;

class WishlistServiceProvider extends BranziaServiceProvider
{
     public function moduleName(): string
    {
        return 'Wishlist';
    }
    public function moduleRootPath():string{
        return dirname(__DIR__);
    }

    public function boot(): void
    {
        parent::boot();
        Customer::resolveRelationUsing('wishlists', function ($model) {
            return $model->hasMany(Wishlist::class, 'customer_id');
        });
    }

    public function register(): void
    {
        parent::register();
        ResourcePageExtensionManager::register(CustomerResource::class, fn () => [
            CustomerWishlist::class => CustomerWishlist::route('/{record}/wishlist'),
        ]);
        ResourceNavigationItemsManager::register(CustomerResource::class, fn () => [
            CustomerWishlist::class,
        ]);
    }
}

