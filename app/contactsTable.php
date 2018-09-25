<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\userTable;

class contactsTable extends Model
{
  protected $table = 'contacts';
  protected $primaryKey = 'contactID';
  public $timestamps = false;

  //public function user()
  //{
    //return $this->belongsTo('App\userTable','userID');
  //}

  public function user()
  {
    return $this->belongsTo('App\donor','userID');
  }

}
