<?php

namespace App\Http\Controllers;

use Auth;
use app\User;
use App\Models\CompanyModel;
use App\Models\ContactModel;
use App\Models\ConversationModel;
use App\Models\HistoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
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
    public function history($arrangement = 'DESC', $user = 'All', $date1 = NULL, $date2 = NULL )
    {
      $users = User::all();
      $filter = array($arrangement, $user, $date1, $date2);

      if(!isset($user)){
        $user = Auth::user()->name;
      }
      //return $user."<br>".$date1."<br>".$date2."<br>".$arrangement;
      $where = [];
      if($user && $user != 'All'){ array_push($where, array("kontakter", '=', $user) ); }
      if($date1 && $date1 != '∞'){ array_push($where, array("date", '>=', $date1) ); }
      if($date2 && $date2 != '∞'){ array_push($where, array("date", '<=', $date2) ); }
      /*$where = [
          ['kontakter', '=', $user],
          ['date', '>=', $date1],
          ['date', '<=', $date2]
      ];*/
      if(!$where){ array_push($where, array('conv_id', '>', 808) ); }

      //dd($where);
      $result = ConversationModel::where($where)->with('contact')->with('company')->orderBy('conv_id', $arrangement)->paginate(20);

      //dd($result->toSql());  // За да видим SQL заявката трябва да пемахнем от $result = ..... ->paginate(20). toSql е несъвместимо с paginate
      return view('history', compact('result','users', 'filter'));

    }

    public function schedule($status = 'missed' )
    {
        $user = Auth::user()->name;
        $today = date("Y-m-d");

        $where = [array("status", '=', 0),array("kontakter", '=', $user)];
        if($status == 'missed'){ array_push($where, array("tage", '<', $today) ); }
        else if($status == 'todays'){ array_push($where, array("tage", '=', $today) ); }
        else { array_push($where, array("tage", '>', $today) ); }


        //dd($where);
        $result = ConversationModel::where($where)->with('contact')->with('company')->orderBy('tage', 'DESC')->paginate(20);

        //dd($result->toSql());  // За да видим SQL заявката трябва да пемахнем от $result = ..... ->paginate(20). toSql е несъвместимо с paginate
        return view('schedule', compact('result','status'));

    }




}
