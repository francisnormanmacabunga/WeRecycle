<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageRequests extends Model
{

  protected $table = 'message_requests';
  protected $primaryKey = 'message_request_id';
  public $timestamps = true;

  public function volunteer()
  {
    return $this->belongsTo('App\Models\Volunteer','volunteerID');
  }

}
