<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Kyslik\ColumnSortable\Sortable;
use Carbon\Carbon;

class Employee extends Model
{

    use LogsActivity;
    use Sortable;
    protected $table = 'user';
    protected $primaryKey = 'userID';
    public $timestamps = true;
    public $sortable = ['created_at', 'status', 'usertypeID', 'updated_at'];

    protected static $logName = 'Employee Account';
    protected static $logAttributes = ["*"];
    protected static $logOnlyDirty = true;
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Has {$eventName}";
    }

  /*  public static function boot()
    {
    parent::boot();
    static::saving(function (Model $model) {
        static::$logAttributes = array_keys($model->getDirty());
    });
  } */

    public function getNameAttribute()
    {
        return $this->causer->username ?? null;
    }

    public function messageRequest()
    {
      return $this->hasOne('App\Models\MessageRequests','transid');
    }

    public function messageOrder()
    {
      return $this->hasOne('App\Models\MessageOrders','transid');
    }

    public function age()
    {
    return Carbon::parse($this->attributes['birthdate'])->age;
    }

    public function contacts()
    {
    return $this->hasOne('App\Models\Contacts','userID');
    }

    public function volunteer()
    {
    return $this->hasOne('App\Models\Volunteer','volunteerID');
    }

}
