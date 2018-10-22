<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
  protected $table = 'reward';
  protected $primaryKey = 'rewardID';
  public $timestamps = true;

  public function user()
  {
    return $this->belongsTo('App\Models\Donor','userID');
  }

}
