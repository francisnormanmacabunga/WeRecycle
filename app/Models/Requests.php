<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
  protected $table = 'request';
  protected $primaryKey = 'requestID';
  public $timestamps = true;

  public function user()
  {
    return $this->belongsTo('App\Models\Donor', 'userID');
  }

}
