<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;

class Video extends RootModel
{
    protected $table = 'video';

    public function parentable(): MorphTo
    {
        return $this->morphTo();
    }
}
