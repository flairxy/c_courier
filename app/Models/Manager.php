<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'office_id',
        'email',
        'password'
    ];
}
