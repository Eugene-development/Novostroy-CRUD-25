<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;
use DateTimeInterface;

class Image extends RootModel
{
    protected $table = 'image';

    /**
     * The storage format of the model's date columns.
     * Format with microseconds for database storage.
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:s.u';

    public function parentable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return Carbon::instance($date)->toJSON();
    }
}
