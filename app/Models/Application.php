<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    const APPROVED = 1;
    const UNAPPROVED = 2;
    const PAID = 1;

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
