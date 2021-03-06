<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class MessageOrders extends Model
{
  use Sortable;
  protected $table = 'message_orders';
  protected $primaryKey = 'message_order_id';
  public $timestamps = true;
  public $sortable = ['created_at'];

  public function volunteer()
  {
    return $this->belongsTo('App\Models\Volunteer','volunteerID');
  }

}
