<?php

namespace App\Models\Scopes;

use App\Models\Pages\HomePage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;


class HomePageScope implements Scope {
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void {
        $builder->where('page_type', HomePage::PAGE_TYPE);
    }
}
