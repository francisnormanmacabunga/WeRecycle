<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Transaction extends Model
{

  use Sortable;
  protected $table = 'transactions';
  protected $primaryKey = 'transid';
  public $timestamps = true;
  public $sortable = ['created_at', 'status'];

  public function user()
  {
    return $this->belongsTo('App\Models\Donor','userID');
  }

  public function messageRequest()
  {
    return $this->hasOne('App\Models\MessageRequests','transid');
  }

  public function messageOrder()
  {
    return $this->hasOne('App\Models\MessageOrders','transid');
  }

  public function volunteer()
  {
    return $this->belongsTo('App\Models\Volunteer','volunteerID');
  }


}
