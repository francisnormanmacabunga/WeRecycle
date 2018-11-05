<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Order extends Model
{
    use LogsActivity;
    protected $table = 'orders';
    protected $primaryKey = 'orderid';
    public $timestamps = true;

    protected static $logAttributes = ["*"];
    protected static $logName = 'Order';
    protected static $logOnlyDirty = true;
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Has placed an";
    }

    public function user()
    {
      return $this->belongsTo('App\Models\Donor', 'userID');
    }

}
