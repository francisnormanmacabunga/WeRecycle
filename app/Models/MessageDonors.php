<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class MessageDonors extends Model
{
    use Sortable;
    protected $table = 'message_donors';
    protected $primaryKey = 'message_donor_id';
    public $timestamps = true;
    public $sortable = ['created_at'];

    public function donor()
    {
      return $this->belongsTo('App\Models\Donor', 'userID');
    }

}
