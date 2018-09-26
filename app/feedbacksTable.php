<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class feedbacksTable extends Model
{
  use Sortable;
  protected $table = 'feedback';
  protected $primaryKey = 'feedbackID';
  public $timestamps = false;
  public $sortable = ['created_at', 'rating'];


  //public function user()
  //{
    //return $this->belongsTo('App\userTable','userID');
  //}

}
