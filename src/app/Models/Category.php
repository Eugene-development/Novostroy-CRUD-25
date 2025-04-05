<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;


class Category extends RootModel
{
    protected $table = 'category';

    public function metaTitle(): MorphOne
    {
        return $this->morphOne(MetaTitle::class, 'parentable');
    }

    public function metaDescription(): MorphOne
    {
        return $this->morphOne(MetaDescription::class, 'parentable');
    }


    public function product(): MorphMany
    {
        return $this->morphMany(Product::class, 'parentable');
    }
    
    public function parentable(): MorphTo
    {
        return $this->morphTo();
    }
}
