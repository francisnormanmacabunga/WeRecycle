<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\DonorResetPasswordNotification;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\Traits\LogsActivity;
use Carbon\Carbon;

class Donor extends Authenticatable
{

    use LogsActivity;
    use Sortable;
    use Notifiable;
    protected $guard = 'donor';
    protected $table = 'user';
    protected $primaryKey = 'userID';
    public $timestamps = true;
    public $sortable = ['created_at'];
    protected static $logName = 'Donor Account';
    protected static $logAttributes = ["*"];
    protected static $logOnlyDirty = true;
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Has {$eventName}";
    }

    /*public static function boot()
    {
    parent::boot();
    static::saving(function (Donor $model) {
        static::$logAttributes = array_keys($model->getDirty());
    });
    }*/

    public function getNameAttribute()
    {
        return $this->causer->username ?? null;
    }

    public function setAttribute($key, $value)
    {
      $isRememberTokenAttribute = $key == $this->getRememberTokenName();
      if (!$isRememberTokenAttribute)
      {
        parent::setAttribute($key, $value);
      }
    }

    public function contacts()
    {
    return $this->hasOne('App\Models\Contacts', 'userID');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new DonorResetPasswordNotification($token));
    }

    public function points()
    {
    return $this->hasOne('App\Models\Points', 'pointsID');
    }

    public function age()
    {
    return Carbon::parse($this->attributes['birthdate'])->age;
    }

    public function messageDonors()
    {
      return $this->hasOne('App\Models\MessageDonors', 'userID');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /*protected $fillable = [
        'name', 'email', 'password',
    ];*/

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    /*protected $hidden = [
        'password', 'remember_token',
    ];*/

}
