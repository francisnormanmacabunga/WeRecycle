<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class MessageRequests extends Model
{
  use Sortable;
  protected $table = 'message_requests';
  protected $primaryKey = 'message_request_id';
  public $timestamps = true;
  public $sortable = ['created_at'];

  public function volunteer()
  {
    return $this->belongsTo('App\Models\Volunteer','volunteerID');
  }

}
