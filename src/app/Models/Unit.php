<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;


class Unit extends RootModel
{
    protected $table = 'unit';

    public function parentable(): MorphTo
    {
        return $this->morphTo();
    }
}
