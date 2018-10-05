<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
  protected $table = 'orders';
  protected $primaryKey = 'orderid';
  public $timestamps = true;
    public function user(){
      return $this->belongsTo('App\donor');
    }
}
