<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $guarded = [
        'id',

    ];

    protected $table = 'shipments_location';
}
