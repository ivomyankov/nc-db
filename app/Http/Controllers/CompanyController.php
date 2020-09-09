<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\CompanyModel;
use App\Models\ContactModel;
use App\Models\ConversationModel;
use App\Models\HistoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function company($id=1)
    {
      $total = CompanyModel::count();
      if($id > $total || $id < 1 ){
        $id = 1;
      }
      $result = CompanyModel::where('id', '=', $id)->with('contacts')->with('conversations')->get();
      $users = User::all();

      //dd($result[0]);
      //echo "<pre>";
      //print_r($result);
      return view('company', compact('result','total','users'));
    }

    public function type()
    {
      $result = CompanyModel::where('kundentyp', '!=', '')->select('id', 'firma1', 'kundentyp')->get();


      foreach ($result as $company){
        $type = array();
        if(strpos($company->kundentyp, 'A')!== false) {  $type[] = 'Car';}
        if(strpos($company->kundentyp, 'B')!== false) {  $type[] = 'Boat';}
        if(strpos($company->kundentyp, 'F')!== false) {  $type[] = 'Airplane';}
        if(strpos($company->kundentyp, 'M')!== false) {  $type[] = 'MY';}
        if(strpos($company->kundentyp, 'S')!== false) {  $type[] = 'SY';}
        if(strpos($company->kundentyp, 'L')!== false) {  $type[] = 'Licensee';}
        CompanyModel::where('id', $company->id)->update(array('type' => implode(",",$type)));
        echo $company->id.' / '.$company->firma1.' / '.$company->kundentyp.' / '.implode(",",$type).' <br> ';
      }





      /*


      if( CompanyModel::where('kundentyp', '!=' '')->update($data) ) {
        return redirect('/company/'.$id)->with('success', 'Company data updated');
      } else {
        return redirect('/company/'.$id)->with('error', 'Company data updated FAILED');
      }
*/

      //return 'test';
    }


    public function search(Request $request){
      $data = request()->validate([
        'search' => 'required|min:2|max:100'
      ]);

      $pieces = explode(" ", $data['search']);
      $srch = $data['search'];
      $dbFields = array("firma1", "firma2", "firma3", "ort", "land", "email", "url", "kontakter", "type", "kontakt.name", "kontakt.vorname", "kontakt.function", "kontakt.abteilung", "kontakt.nl", "kontakt.sprache");
      //dd($pieces);

      $search = CompanyModel::query()  ;
      foreach ($pieces as $key => $piece) {
            //$search = $search->orWhere('firma1', "LIKE", "%{$piece}%");
            $search = $search->Where(function($query) use ($dbFields, $piece){
                        foreach ($dbFields as $key => $dbField) {
                          $query->orWhere($dbField, 'LIKE', "%{$piece}%");
                        }
                      });
      }



      $result = $search->select('company.id', 'firma1')->join('kontakt', 'company.id', '=', 'kontakt.company_id')->with('contacts')->with('conversations')->distinct('company.id')->get();
      $count = $result->count();
      return view('search', compact('result', 'srch', 'count'));
      //return  $search->join('kontakt', 'company.id', '=', 'kontakt.company_id')->with('contacts')->with('conversations')->toSql();
      //return $search->toSql();
      //dd($result);



    }

    public function newCompany(Request $request){
      $data = request()->validate([
        'firma1' => 'required|min:3|max:50',
        'email' => 'email|nullable',
        'url' => 'active_url|nullable'
      ]);

      $value=CompanyModel::where('firma1', $data['firma1'])->get();
      if($value->count() == 0){
        $newID = CompanyModel::create($data);
        if( $newID->id ) {
          return redirect('/company/'.$newID->id)->with('success', 'New Company created');
        } else {
          return redirect('/company/')->with('error', 'Company data save FAILED');
        }
      }else{
        return redirect('/new/')->with('error', 'Already exists');
      }
      /*
      // variant 2
      $contact = new ContactModel;
      $contact->company_id = $id;
      $contact->name = $request->input('name');
      $contact->vorname = $request->input('vorname');
      $contact->save();
      // variant 2
      */



      return redirect('/company/'.$newID->id)->with('success', 'Company Created');
    }

    public function newContactCompany(Request $request){
      $data = request()->validate([
        'firma1' => 'required|min:3|max:50|alpha',
        'email' => 'email',
        'url' => 'active_url'
      ]);

      $user = User::create([
          'username' => $data['username'] . ' ' . $data['username2'],
          'mail' => $data['mail'],
          'password' => bcrypt($data['password']),
      ]);

      $userInfo = UserInformation::create([
          'user_id' => $user->id,
          'current_food' => $food,
          'current_level' => $level,
      ]);

      return redirect('/company/'.$newID->id)->with('success', 'Company Created');
    }




    public function store(Request $request, $id){
      $data = request()->validate([
        'company_id' => 'required|numeric',
        'name' => 'required|min:3|max:20|alpha',
        'vorname' => 'required|min:3|max:20|alpha'
      ]);

      //dd($data);
      /*
      variant 1
      requires turning off massasign protection from the model by protected $guarded = []; for all or
      protected $fillable = ['company_id','name','vorname'...];
      */
      $value=ContactModel::where('name', $data['name'])->where('vorname', $data['vorname'])->get();
      if($value->count() == 0){
        ContactModel::create($data); // variant 1 requires turning off massasign protection from the model by protected $guarded = [];
      }else{
        return redirect('/company/'.$id)->with('error', 'Already exists');
      }

      /*
      // variant 2
      $contact = new ContactModel;
      $contact->company_id = $id;
      $contact->name = $request->input('name');
      $contact->vorname = $request->input('vorname');
      $contact->save();
      // variant 2
      */

      return redirect('/company/'.$id)->with('success', 'Contact Created');
    }


    // Update company date
    public function updateCompany(Request $request, $id){
      $data = request()->validate([
        'firma1' => 'required|min:3|max:50',
        'firma2' => 'min:3|max:50|nullable',
        'firma3' => 'nullable',
        'strabe' => 'max:50',
        'plz' => 'max:30',
        'ort' => 'max:30',
        'land' => 'max:30',
        'telefon' => '',
        'telefax' => '',
        'email' => 'email|nullable',
        'url' => 'url|nullable',
        'kontakter' => 'required|min:3|max:30',
        'type' => 'nullable',
        'quelle' => '',
        'blz' => '',
        'konto' => '',
        'uid' => ''
      ]);

      if(isset($data['type'])){
        $data['type'] = implode(',', $data['type']);
      } else {
        $data['type'] = null;
      }

      //dd($data);

      if( CompanyModel::where('id', $id)->update($data) ) {
        return redirect('/company/'.$id)->with('success', 'Company data updated');
      } else {
        return redirect('/company/'.$id)->with('error', 'Company data updated FAILED');
      }

    }

    // Save conversation
    public function saveConv(Request $request){
      //$conv = $request->input('conversation');
      $data = request()->validate([
        'company_id' => 'required|numeric',
        'kontakt_id' => 'required|numeric',
        'kontakter' => 'required|min:3|max:50',
        'tage' => 'required',
        'date' => 'required',
        'conversation' => 'required|min:3|max:20'
      ]);

      ConversationModel::create($data); // variant 1 requires turning off massasign protection from the model by protected $guarded = [];

        //dd($request);
        //return $_POST['company_id'];
        //return $data['conversation'] ;
        //return redirect('/company/'.$data['company_id'].'/'.$data['kontakt_id'])->with('success', 'Conversation saved');

    }

    // Update company date
    public function updateContact(Request $request, $companyId, $contactId){
      $data = request()->validate([
        'anrede' => '',
        'name' => 'required|min:3|max:20|alpha',
        'vorname' => 'required|min:3|max:20|alpha',
        'function' => '',
        'abteilung' => '',
        'telefon_dw' => '',
        'telefax_dw' => '',
        'email_kontakt' => 'email|nullable',
        'mobil' => '',
        'nl' => '',
        'sprache' => ''
      ]);

      if(isset($data['sprache'])){
        $data['sprache'] = implode(',', $data['sprache']);
      } else {
        $data['sprache'] = null;
      }

      if(isset($data['nl']) && $data['nl']=='ja'){
        if(ContactModel::where('id', $contactId)->where('nl', 'nein')->get()){
          $data += [ "genehmigung" => date("Y-m-d") ];
        }
      } else {
        $data += [ "genehmigung" => null ];
      }

      //dd($data);

      if( ContactModel::where('id', $contactId)->update($data) ) {
        return redirect('/company/'.$companyId.'/'.$contactId)->with('success', 'Contact ID:'.$contactId.' updated');
      } else {
        return redirect('/company/'.$companyId.'/'.$contactId)->with('error', 'Company ID:'.$contactId.' updated FAILED');
      }

    }



    public function history()
    {
      $history = ConversationModel::where('date', '>', '0000-00-00')
        ->orderBy('date','DESC')
        ->take(20)
        ->get();

      //$result = Company::all();
      $result = HistoryModel::where('date', '>', '0000-00-00')
        ->orderBy('date','DESC')
        ->take(20)
        ->get();

      //print_r($wordCount = count($result));
      $total = HistoryModel::where('date', '>', '0000-00-00')
        ->count();

      $company = CompanyModel::all();

      dd($history);
      //return view('history', compact('result','total', 'history'));
    }
}
