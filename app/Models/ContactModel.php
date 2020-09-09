<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
//use App\Models\CompanyModel;

Class ContactModel extends Model {
  // specify the table, primary key and if not autoincremening make it false
  protected $table = 'kontakt';
  protected $primaryKey = 'id';
  protected $guarded = [];  //turns off massasign protection for all or: protected $fillable = ['company_id','name','vorname'...];
  //public $incrementing = false;

  public $timestamps = false; //By default laravel will expect created_at & updated_at column in your table. By making it to false it will override the default setting.

  public function company(){
    return $this->belongsTo(ContactModel::class, 'id', 'company_id');
  }

  public function getContact(){
    //return $this->hasMany(ContactModel::class, 'company_id', 'id');
    return CompanyModel::where('id', $this->company_id)->first()->firma1;
  }


}
