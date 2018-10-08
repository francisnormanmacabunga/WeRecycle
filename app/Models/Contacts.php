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
  protected static $logAttributes = ["*"];

  public static function boot()
  {
  parent::boot();
  static::saving(function (Contacts $model) {
      static::$logAttributes = array_keys($model->getDirty());
  });
  }

  public function getNameAttribute()
  {
      return $this->causer->username ?? null;
  }

  public function user()
  {
    return $this->belongsTo('App\Models\Donor','userID');
  }

}
