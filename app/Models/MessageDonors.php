<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageDonors extends Model
{
    protected $table = 'message_donors';
    protected $primaryKey = 'message_donor_id';
    public $timestamps = false;

    public function donor()
    {
      return $this->belongsTo('App\Models\Donor','userID');
    }

}
