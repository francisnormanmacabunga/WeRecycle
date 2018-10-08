<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class requestTable extends Model
{
  protected $table = 'message';
  protected $primaryKey = 'messageID';
  public $timestamps = false;


  //public function user()
  //{
    //return $this->belongsTo('App\userTable','userID');
  //}

}
