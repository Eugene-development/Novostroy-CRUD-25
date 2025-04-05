<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;


class Tag extends RootModel
{

    protected $table = 'tag';

    public function product(): MorphToMany
    {
        return $this->morphedByMany(Product::class, 'taggable')->withTimestamps();
    }

    public function parentable(): MorphTo
    {
        return $this->morphTo();
    }
}
