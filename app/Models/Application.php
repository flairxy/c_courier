<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    const RECEIVED = 1;
    const PAID = 1;
    const NOT_RECEIVED = 0;

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
