<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

Class HistoryModel extends Model {
  // specify the table, primary key and if not autoincremening make it false
  protected $table = 'conversation';
  protected $primaryKey = 'conv_id';
  //public $incrementing = false;

}
