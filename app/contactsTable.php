<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\userTable;

use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class contactsTable extends Model implements AuditableContract
{
  use Auditable;
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

  //public function user()
  //{
  //return $this->belongsTo(Config::get('audit.user.model'), 'userID');
  //}

}
