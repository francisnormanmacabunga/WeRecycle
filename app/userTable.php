<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Kyslik\ColumnSortable\Sortable;
use App\contactsTable;

use Roketin\Auditing\AuditingTrait;
use Roketin\Auditing\Auditing;

use Spatie\Activitylog\Traits\LogsActivity;

class userTable extends Model
{
    use LogsActivity;
    use AuditingTrait;
    use Sortable;

    protected $table = 'user';
    protected $primaryKey = 'userID';
    public $timestamps = true;
    public $sortable = ['created_at', 'status', 'usertypeID'];

    protected static $logFillable = true;

    public function age()
    {
    return Carbon::parse($this->attributes['birthdate'])->age;
    }

    public function contacts()
    {
    return $this->hasOne('App\contactsTable','userID');
    }

<<<<<<< HEAD

    public function transaction()
    {
    return $this->hasMany('App\transaction','transID');
    }


    //public function user()
    //{
    //return $this->belongsTo(Config::get('audit.user.model'), 'userID');
    //}

    //public function feedbacks()
    //{
    //return $this->hasMany('App\feedbacksTable','userID');
    //}

=======
>>>>>>> f37c554b2d939ba6458dd31348c55f91bf98edfc
}
