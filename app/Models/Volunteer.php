<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\Traits\LogsActivity;
use Carbon\Carbon;

class Volunteer extends Model
{
  use LogsActivity;
  use Sortable;
  protected $table = 'volunteer';
  protected $primaryKey = 'volunteerID';
  public $timestamps = true;
  public $sortable = ['created_at', 'status', 'usertypeID'];

  protected static $logName = 'Volunteer Account';
  protected static $logAttributes = ["*"];
  protected static $logOnlyDirty = true;
  public function getDescriptionForEvent(string $eventName): string
  {
      return "Has {$eventName}";
  }

  public function contacts()
  {
  return $this->hasOne('App\Models\Contacts', 'volunteerID');
  }

  public function age()
  {
  return Carbon::parse($this->attributes['birthdate'])->age;
  }

  public function transaction()
  {
    return $this->hasOne('App\Models\Transaction','volunteerID');
  }

}
