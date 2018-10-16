<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\Traits\LogsActivity;

class Transaction extends Model
{

  use LogsActivity;
  use Sortable;
  protected $table = 'transactions';
  protected $primaryKey = 'transid';
  public $timestamps = true;
  public $sortable = ['created_at', 'status'];
  protected static $logName = 'Transaction';
  protected static $logAttributes = ["*"];
  protected static $logOnlyDirty = true;
  public function getDescriptionForEvent(string $eventName): string
  {
      return "Has {$eventName}";
  }

  public function donor()
  {
    return $this->belongsTo('App\Models\Donor','userID');
  }

  public function messageRequest()
  {
    return $this->hasOne('App\Models\MessageRequests','userID');
  }

  public function messageOrder()
  {
    return $this->hasOne('App\Models\MessageOrders','userID');
  }

  public function volunteer()
  {
    return $this->belongsTo('App\Models\Volunteer','volunteerID');
  }


}
