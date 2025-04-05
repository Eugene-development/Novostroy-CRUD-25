<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taggable extends Model
{
    protected $table = 'taggables';

    public $incrementing = false;
    // public $timestamps = false;
    protected $primaryKey = null;
    public $keyType = null;
}
