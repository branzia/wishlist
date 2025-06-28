<?php

namespace Branzia\Wishlist;
use Illuminate\Support\Facades\File;
use Branzia\Blueprint\BranziaServiceProvider;

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
    }

    public function register(): void
    {
        parent::register();
    }
}

