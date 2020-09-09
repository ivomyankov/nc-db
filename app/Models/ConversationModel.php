<?php

namespace app\Models;
use App\Models\ContactModel;
use App\Models\CompanyModel;
use Illuminate\Database\Eloquent\Model;

Class ConversationModel extends Model {
  // specify the table, primary key and if not autoincremening make it false
  protected $table = 'conversation';
  protected $primaryKey = 'conv_id';
  protected $guarded = [];  //turns off massasign protection for all or: protected $fillable = ['company_id','name','vorname'...];
  public $timestamps = false;
  //public $incrementing = false;

  /*public function conversations(){
    return $this->hasOne(CompanyModel::class, 'id', 'company_id');
  }*/

  public function company(){
    return $this->hasOne(CompanyModel::class, 'id', 'company_id');
  }

  public function contact(){
    return $this->hasOne(ContactModel::class, 'id', 'kontakt_id');
  }
}
