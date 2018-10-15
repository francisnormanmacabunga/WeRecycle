<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageOrders extends Model
{

  protected $table = 'message_orders';
  protected $primaryKey = 'message_order_id';
  public $timestamps = false;

  public function user()
  {
    return $this->belongsTo('App\Models\Employee','userID');
  }

  public function transaction()
  {
    return $this->belongsTo('App\Models\Transaction','transid');
  }

}
