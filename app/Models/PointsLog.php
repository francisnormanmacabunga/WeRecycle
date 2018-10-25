<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PointsLog extends Model
{
    use Sortable;
  protected $table = 'points_log';
  protected $primaryKey = 'points_log_id';
  public $timestamps = true;

  public function user()
  {
    return $this->belongsTo('App\Models\Donor','userID');
  }

}
