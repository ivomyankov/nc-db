<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
//use App\Models\CompanyModel;

Class UserModel extends Model {
  // specify the table, primary key and if not autoincremening make it false
  protected $table = 'users';
  protected $primaryKey = 'id';
  //public $incrementing = false;

  

}
