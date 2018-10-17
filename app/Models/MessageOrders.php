<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageOrders extends Model
{

  protected $table = 'message_orders';
  protected $primaryKey = 'message_order_id';
  public $timestamps = true;

  public function volunteer()
  {
    return $this->belongsTo('App\Models\Volunteer','volunteerID');
  }

}
