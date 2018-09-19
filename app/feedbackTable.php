<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Kyslik\ColumnSortable\Sortable;
use App\userTable;

class feedbackTable extends Model
{
  use Sortable;
    protected $table = 'feedback';
    protected $primaryKey = 'feedbackID';
    public $timestamps = true;
    public $sortable = ['created_at'];
}
