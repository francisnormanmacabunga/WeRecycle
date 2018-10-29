<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Requests extends Model
{
  use LogsActivity;
  protected $table = 'request';
  protected $primaryKey = 'requestID';
  public $timestamps = true;
  protected static $logAttributes = ["*"];
  protected static $logName = 'Transaction';
  protected static $logOnlyDirty = true;
  public function getDescriptionForEvent(string $eventName): string
  {
      return "Has {$eventName}";
  }

  public function user()
  {
    return $this->belongsTo('App\Models\Donor', 'userID');
  }

}
