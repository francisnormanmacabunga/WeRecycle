<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class feedbackTable extends Model
{
  use Sortable;
  protected $table = 'feedback';
  protected $primaryKey = 'feedbackID';
  public $timestamps = false;

}
