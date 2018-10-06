<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Kyslik\ColumnSortable\Sortable;
use App\contactsTable;
use Spatie\Activitylog\Traits\LogsActivity;

class userTable extends Model
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

    public $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->causer->username ?? null;
    }

    public function age()
    {
    return Carbon::parse($this->attributes['birthdate'])->age;
    }

    public function contacts()
    {
    return $this->hasOne('App\contactsTable','userID');
    }

}
