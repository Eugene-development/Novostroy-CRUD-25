<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Catalog extends RootModel
{
    protected $table = 'catalog';

    public function metaTitle(): MorphOne
    {
        return $this->morphOne(MetaTitle::class, 'parentable');
    }

    public function metaDescription(): MorphOne
    {
        return $this->morphOne(MetaDescription::class, 'parentable');
    }

    public function rubric(): MorphMany
    {
        return $this->morphMany(Rubric::class, 'parentable');
    }

    public function text(): MorphOne
    {
        return $this->morphOne(Text::class, 'parentable');
    }
    
    public function image(): MorphMany
    {
        return $this->morphMany(Image::class, 'parentable');
    }
 
}
