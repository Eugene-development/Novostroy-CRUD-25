<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;


class RootModel extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $guarded = [];

    // public function getConnection()
    // {
    //     // Определите подключение на основе запроса
    //     $request = app(Request::class);
    //     DatabaseGateway::switchConnection($request);

    //     return parent::getConnection();
    // }
}
