<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productsTable extends Model
{
  protected $table = 'products';
  protected $primaryKey = 'productsID';
  public $timestamps = true;
}
