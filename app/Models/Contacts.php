<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
  protected $table = 'contacts';
  protected $primaryKey = 'contactID';
  public $timestamps = false;

  public function user()
  {
    return $this->belongsTo('App\Models\donor','userID');
  }

}
