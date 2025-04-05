<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;


class Rubric extends RootModel
{
    protected $table = 'rubric';
    
    public function metaTitle(): MorphOne
    {
        return $this->morphOne(MetaTitle::class, 'parentable');
    }

    public function metaDescription(): MorphOne
    {
        return $this->morphOne(MetaDescription::class, 'parentable');
    }

    public function category(): MorphMany
    {
        return $this->morphMany(Category::class, 'parentable');
    }
    
    public function parentable(): MorphTo
    {
        return $this->morphTo();
    }

}
