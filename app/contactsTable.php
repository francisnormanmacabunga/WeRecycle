<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactsTable extends Model
{
  protected $table = 'contacts';
  protected $primaryKey = 'contactID';
  public $timestamps = false;

}
