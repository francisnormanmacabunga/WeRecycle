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

}
