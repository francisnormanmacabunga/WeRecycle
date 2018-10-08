<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ActivityCoordinatorResetPasswordNotification;
use Spatie\Activitylog\Traits\LogsActivity;

class ActivityCoordinator extends Authenticatable
{

    use LogsActivity;
    use Notifiable;
    protected $guard = 'activitycoordinator';
    protected $table = 'user';
    protected $primaryKey = 'userID';
    public $timestamps = true;
    protected static $logAttributes = ["*"];

    public static function boot()
    {
    parent::boot();
    static::saving(function (ActivityCoordinator $model) {
        static::$logAttributes = array_keys($model->getDirty());
    });
    }

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
        $this->notify(new ActivityCoordinatorResetPasswordNotification($token));
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
