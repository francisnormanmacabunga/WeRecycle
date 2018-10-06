<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
  protected $table = 'transactions';
  protected $primaryKey = 'transid';
  public $timestamps = true;


  public function user(){
    return $this->belongsTo('App\donor');
  }

  public function users(){
    return $this->belongsTo('App\userTable', 'userID');
  }

}
