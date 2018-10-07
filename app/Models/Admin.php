<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Activitylog\Traits\LogsActivity;

class Admin extends Authenticatable
{

    use LogsActivity;
    use Notifiable;
    protected $guard = 'admin';
    protected $table = 'user';
    protected $primaryKey = 'userID';
    public $timestamps = true;
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

    public function setAttribute($key, $value)
    {
      $isRememberTokenAttribute = $key == $this->getRememberTokenName();
      if (!$isRememberTokenAttribute)
      {
        parent::setAttribute($key, $value);
      }
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
