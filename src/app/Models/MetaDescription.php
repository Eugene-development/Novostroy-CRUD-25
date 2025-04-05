<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;

class MetaDescription extends RootModel
{

    protected $table = 'metadescription';

    public function parentable(): MorphTo
    {
        return $this->morphTo();
    }
}
