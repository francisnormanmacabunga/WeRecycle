<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Kyslik\ColumnSortable\Sortable;

class Products extends Model
{

  use LogsActivity;
  use Sortable;
  protected $table = 'products';
  protected $primaryKey = 'productsID';
  public $timestamps = true;
  public $sortable = ['created_at', 'price', 'status'];

  protected static $logName = 'Product';
  protected static $logAttributes = ["*"];
  protected static $logOnlyDirty = true;
  public function getDescriptionForEvent(string $eventName): string
  {
      return "Has {$eventName}";
  }

  /*public static function boot()
  {
  parent::boot();
  static::saving(function (Model $model) {
      static::$logAttributes = array_keys($model->getDirty());
  });
}*/

  public function getNameAttribute()
  {
      return $this->causer->username ?? null;
  }

}
