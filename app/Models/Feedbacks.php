<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Kyslik\ColumnSortable\Sortable;

class Feedbacks extends Model
{

  use LogsActivity;
  use Sortable;
  protected $table = 'feedback';
  protected $primaryKey = 'feedbackID';
  public $timestamps = false;
  public $sortable = ['created_at', 'rating'];
  protected static $logName = 'Feedback';
  protected static $logAttributes = ["*"];
  protected static $logOnlyDirty = true;
  public function getDescriptionForEvent(string $eventName): string
  {
      return "Has {$eventName}";
  }

  /*public static function boot()
  {
  parent::boot();
  static::saving(function (Feedbacks $model) {
      static::$logAttributes = array_keys($model->getDirty());
  });
  }*/

  public function getNameAttribute()
  {
      return $this->causer->username ?? null;
  }

}
