<?php

namespace App\Models\Pages;

use App\Models\Page;
use App\Models\Scopes\HomePageScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomePage extends Page {
    use HasFactory;

    const PAGE_TYPE = 'home';

    protected static function boot(): void {
        parent::boot();

        static::addGlobalScope(new HomePageScope());

        static::creating(function ($query) {
            $query->page_type = self::PAGE_TYPE;
            $query->slug = '/';
        });
    }
}
