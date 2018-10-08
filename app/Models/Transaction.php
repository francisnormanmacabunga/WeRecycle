<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

  protected $table = 'transactions';
  protected $primaryKey = 'transid';
  public $timestamps = true;

  public function user(){
    return $this->belongsTo('App\Model\Donor','userID');
  }

}
