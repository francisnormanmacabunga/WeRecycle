<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

  protected $table = 'message';
  protected $primaryKey = 'messageID';
  public $timestamps = false;

  public function user()
  {
    return $this->belongsTo('App\Models\Employee','userID');
  }
  
  public function transaction()
  {
    return $this->belongsTo('App\Models\Transaction','transid');
  }

}
