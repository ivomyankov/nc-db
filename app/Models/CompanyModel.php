<?php

namespace app\Models;

use App\Models\ContactModel;
use App\Models\ConversationModel;

use Illuminate\Database\Eloquent\Model;

Class CompanyModel extends Model {
  // specify the table, primary key and if not autoincremening make it false
  protected $table = 'company';
  protected $primaryKey = 'id';
  public $timestamps = false;
  protected $guarded = [];  //turns off massasign protection for all or: protected $fillable = ['company_id','name','vorname'...];
  //public $incrementing = false;

  public function conversations(){
    return $this->hasMany(ConversationModel::class, 'company_id', $this->id)->orderBy('conv_id','desc');;
  }

  public function contacts(){
    return $this->hasMany(ContactModel::class, 'company_id', $this->id)->orderBy('id','desc');
  }

  public function getContact(){
    return ContactModel::where('company_id', $this->id)->first()->name;
  }

  public static function updateCompany($id, $data){
    DB::table('company')->where('id', '=', $id)->update($data);
  }

}
