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
    public $sortable = ['created_at', 'status', 'usertypeID'];
    protected static $logAttributes = ["*"];

    public static function boot()
    {
    parent::boot();
    static::saving(function (Model $model) {
        static::$logAttributes = array_keys($model->getDirty());
    });
    }

    public function getNameAttribute()
    {
        return $this->causer->username ?? null;
    }
    public function message()
    {
      return $this->hasOne('App\Models\Message','userID');
    }
    public function age()
    {
    return Carbon::parse($this->attributes['birthdate'])->age;
    }

    public function contacts()
    {
    return $this->hasOne('App\Models\Contacts','userID');
    }

}
