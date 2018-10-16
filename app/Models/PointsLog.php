<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointsLog extends Model
{
  protected $table = 'points_log';
  protected $primaryKey = 'points_log_id';
  public $timestamps = true;

  public function user()
  {
    return $this->belongsTo('App\Models\Donor','userID');
  }

}
