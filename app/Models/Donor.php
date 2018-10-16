<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\DonorResetPasswordNotification;
use Spatie\Activitylog\Traits\LogsActivity;

class Donor extends Authenticatable
{

    use LogsActivity;
    use Notifiable;
    protected $guard = 'donor';
    protected $table = 'user';
    protected $primaryKey = 'userID';
    public $timestamps = true;
    protected static $logAttributes = ["*"];

    public static function boot()
    {
    parent::boot();
    static::saving(function (Donor $model) {
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
        $this->notify(new DonorResetPasswordNotification($token));
    }

    public function orders(){
      return $this->belongsTo('App\order');
    }

    public function points()
    {
    return $this->hasOne('App\Models\Points', 'pointsID');
    }

    public function pointslog()
    {
    return $this->hasMany('App\Models\PointsLog', 'points_log_id');
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
