<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageRequests extends Model
{

  protected $table = 'message_requests';
  protected $primaryKey = 'message_request_id';
  public $timestamps = false;

  public function user()
  {
    return $this->belongsTo('App\Models\Employee','userID');
  }

  public function transaction()
  {
    return $this->belongsTo('App\Models\Transaction','transid');
  }

  public function volunteer()
  {
    return $this->belongsTo('App\Models\Volunteer','volunteerID');
  }

}
