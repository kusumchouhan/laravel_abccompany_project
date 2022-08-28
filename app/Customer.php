<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    public function voucher()
    {
      return $this->hasOne(Voucher::class);
    }
  
    public function purchasetransactions()
    {
       return $this->hasMany(PurchaseTransaction::class);
    }
}
