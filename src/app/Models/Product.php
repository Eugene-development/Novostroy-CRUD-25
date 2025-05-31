<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Product extends RootModel
{
    protected $table = 'product';

    public function metaTitle(): MorphOne
    {
        return $this->morphOne(MetaTitle::class, 'parentable');
    }

    public function metaDescription(): MorphOne
    {
        return $this->morphOne(MetaDescription::class, 'parentable');
    }

    public function image(): MorphMany
    {
        return $this->morphMany(Image::class, 'parentable');
    }

    public function video(): MorphMany
    {
        return $this->morphMany(Video::class, 'parentable');
    }

    public function price(): MorphOne
    {
        return $this->morphOne(Price::class, 'parentable');
    }

    public function unit(): MorphOne
    {
        return $this->morphOne(Unit::class, 'parentable');
    }

    public function text(): MorphOne
    {
        return $this->morphOne(Text::class, 'parentable');
    }

    // Отношение многие ко многим для тегов
    public function tag(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }

    // Отношение один ко многим для записей в таблицу taggable
    public function taggables(): MorphMany
    {
        return $this->morphMany(Taggable::class, 'taggable');
    }


    public function parentable(): MorphTo
    {
        return $this->morphTo();
    }
}
