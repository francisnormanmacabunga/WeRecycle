<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Kyslik\ColumnSortable\Sortable;
use App\contactsTable;
use Roketin\Auditing\AuditingTrait;

class userTable extends Model
{
    use AuditingTrait;
    use Sortable;
    protected $table = 'user';
    protected $primaryKey = 'userID';
    public $timestamps = true;
    public $sortable = ['created_at', 'status', 'usertypeID'];

    public static $logCustomMessage = '{user.name|Anonymous} {type} a team {elapsed_time}'; // with default value
    public static $logCustomFields = [
        'name'  => 'The name was defined as {new.name||getNewName}', // with callback method
        'owner' => [
            'updated' => '{new.owner} owns the team',
            'created' => '{new.owner|No one} was defined as owner'
        ],
    ];



    public function age()
    {
    return Carbon::parse($this->attributes['birthdate'])->age;
    }

    public function contacts()
    {
    return $this->hasOne('App\contactsTable','userID');
    }

    //public function user()
    //{
    //return $this->belongsTo(Config::get('audit.user.model'), 'userID');
    //}

    //public function feedbacks()
    //{
    //return $this->hasMany('App\feedbacksTable','userID');
    //}

}
