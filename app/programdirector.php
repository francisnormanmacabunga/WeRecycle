<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ProgramDirectorResetPasswordNotification;

class programdirector extends Authenticatable
{
    use Notifiable;

    protected $guard = 'programdirector';
    protected $table = 'user';
    protected $primaryKey = 'userID';
    public $timestamps = true;

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
    return $this->hasOne('App\contactsTable', 'userID');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ProgramDirectorResetPasswordNotification($token));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $fillable = [
        //'name', 'email', 'password',
    //];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //protected $hidden = [
        //'password', 'remember_token',
    //];

}
