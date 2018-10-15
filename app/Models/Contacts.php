<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Contacts extends Model
{

  use LogsActivity;
  protected $table = 'contacts';
  protected $primaryKey = 'contactID';
  public $timestamps = false;

  protected static $logName = 'Contact';
  protected static $logAttributes = ["*"];
  protected static $logOnlyDirty = true;
  public function getDescriptionForEvent(string $eventName): string
  {
      return "Has {$eventName}";
  }

  /*public static function boot()
  {
  parent::boot();
  static::saving(function (Contacts $model) {
      static::$logAttributes = array_keys($model->getDirty());
  });
}*/

  public function getNameAttribute()
  {
      return $this->causer->username ?? null;
  }

  public function volunteer()
  {
    return $this->belongsTo('App\Models\Volunteer','volunteerID');
  }

  public function user()
  {
    return $this->belongsTo('App\Models\Employee','userID');
  }

}
