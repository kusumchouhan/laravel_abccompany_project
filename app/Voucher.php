<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $guarded = [];

    public function Customer()
    {
       return $this->belongsTo(Customer::class);
    }
}
