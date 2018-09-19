<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class productsTable extends Model
{
  use Sortable;
  protected $table = 'products';
  protected $primaryKey = 'productsID';
  public $timestamps = true;
  public $sortable = ['created_at', 'price'];

}
