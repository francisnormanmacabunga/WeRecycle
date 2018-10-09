<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';
    protected $primaryKey = 'orderid';
    public $timestamps = true;

    public function user()
    {
      return $this->belongsTo('App\Models\Donor', 'userID');
    }

}
