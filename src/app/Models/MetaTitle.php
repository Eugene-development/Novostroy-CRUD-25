<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;

class MetaTitle extends RootModel
{

    protected $table = 'metatitle';

    public function parentable(): MorphTo
    {
        return $this->morphTo();
    }
}
