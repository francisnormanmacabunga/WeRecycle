<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Kyslik\ColumnSortable\Sortable;
use App\contactsTable;


use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class userTable extends Model implements AuditableContract
{
    use Auditable;
    use Sortable;
    protected $table = 'user';
    protected $primaryKey = 'userID';
    public $timestamps = true;
    public $sortable = ['created_at', 'status', 'usertypeID'];

    public function age()
    {
    return Carbon::parse($this->attributes['birthdate'])->age;
    }

    public function contacts()
    {
    return $this->hasOne('App\contactsTable','userID');
    }

    public function user()
    {
    return $this->belongsTo(Config::get('audit.user.model'), 'userID');
    }

    //public function feedbacks()
    //{
    //return $this->hasMany('App\feedbacksTable','userID');
    //}

}
