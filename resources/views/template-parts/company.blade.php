@php
//Prev and Next buttons
if($company->id >= 2 && $company->id <= $total){
  $prev = $company->id - 1;
} else if($company->id < 2 || $company->id > $total ){
  $prev = $total;
}

if($company->id >= 2 && $company->id < $total){
  $next = $company->id + 1;
} else if($company->id < 2 ){
  $next = 2;
} else if($company->id >= $total ){
  $next = 1;
}
@endphp

<form id="formCompany" action="{{route('updateCompany',['id' => $company->id])}}" method="POST">
  @method('PUT')
  @csrf
<fieldset>
  <legend>Company information:<i class="deleted_msg" style="display: inline;">
    @if($company->deleted=='deleted')
      <span style="color:red">Deleted</span>
    @endif
  </i></legend>
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
<tbody><tr>
<td width="110">ID / All <input type="hidden" name="id" value="{{$company->id}}"></td>
<td><table border="0" cellspacing="0" cellpadding="0">
<tbody><tr>
<td width="105" height="52px"><img src="{{ URL::asset('images/save.png') }}" class='btn {{$forbiden}} {{$hidden}}' onclick="$('#formCompany').submit();" title="Update company"></img></td>
<td width="32"><a href="{{route('getcompany',['id' => $prev])}}"><i class='fas fa-angle-left btn' style="font-size:28px; cursor:pointer;" ></i></a></td>
<td width="110"><input class="form-field" type="text" onclick="SelectAll('number');" id="number" style="text-align:center" size="15" value="{{$company->id}} / {{ $total }}"></td>
<td width="32"><a href="{{url('/company')}}/{{$next}}"><i class='fas fa-angle-right btn' style="font-size:28px; cursor:pointer; float:right;" ></i></a></td>
<td width="105"><img src="{{ URL::asset('images/trash_can.png') }}" class='btn {{$forbiden}} {{$hidden}}' onclick="delete_company({{$company->id}})" style='float:right; ' title="Delete company"></img></td>
</tr>
</tbody></table></td>
</tr>
<tr>
<td>Company:</td>
<td><input type="text" name="firma1"  class="all form-field {{$forbiden}}" value="{{$company->firma1}}"  {{$disabled}}></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="text" name="firma2"  class="all form-field {{$forbiden}}" value="{{$company->firma2}}"  {{$disabled}}></td>
</tr>
<tr>
<td>Street &amp; #:</td>
<td><input type="text" name="strabe"  class="all form-field {{$forbiden}}" value="{{$company->strabe}}"  {{$disabled}}></td>
</tr>
<tr>
<td>Poste code: </td>
<td><input type="text" name="plz"  class="all form-field {{$forbiden}}" value="{{$company->plz}}"  {{$disabled}}></td>
</tr>
<tr>
<td>City: </td>
<td><input type="text" name="ort"  class="all form-field {{$forbiden}}" value="{{$company->ort}}"  {{$disabled}}></td>
</tr>
<tr>
<td>Country:</td>
<td><input type="text" name="land"  class="all form-field {{$forbiden}}" value="{{$company->land}}"  {{$disabled}}></td>
</tr>
<tr>
<td>Phone:</td>
<td><input type="text" name="telefon"  class="all form-field {{$forbiden}}" value="{{$company->telefon}}"  {{$disabled}}></td>
</tr>
<tr>
<td>Fax:</td>
<td><input type="text" name="telefax"  class="all form-field {{$forbiden}}" value="{{$company->telefax}}"  {{$disabled}}></td>
</tr>
<tr>
<td>e-Mail:</td>
<td><input type="text" name="email"  class="all form-field {{$forbiden}}" value="{{$company->email}}"  {{$disabled}}></td>
</tr>
<tr>
<td>Web:</td>
<td><input type="text" name="url"  class="all form-field {{$forbiden}}" value="{{$company->url}}"  {{$disabled}}></td>
</tr>
<tr>
<td>Reqruiter:</td>
<td>
  @if (Auth::user()->role=='admin')
    <select name="kontakter" class="form-control" id="kontakter" {{$disabled}} >
      @foreach ($users as $user)
        @if ($company->kontakter==$user->name)
          <option value="{{$user->name}}"  selected >{{$user->name}}</option>
        @else
          <option value="{{$user->name}}" >{{$user->name}}</option>
        @endif
      @endforeach
    </select>
  @else
    <input type="text" name="kontakter"  class="all form-field {{$forbiden}}" value="{{$company->kontakter}}" {{$disabled}}><br>
  @endif
</td>
</tr>
<tr>
<td>Vessel:</td>
<td>
 <br>
Car      <input name="type[]" class="all {{$forbiden}}" type="checkbox" value="Car" @if(strpos($company->type, 'Car')!== false) checked @endif  {{$disabled}}> &nbsp;
Boat     <input name="type[]" class="all {{$forbiden}}" type="checkbox" value="Boat" @if(strpos($company->type, 'Boat')!== false) checked @endif  {{$disabled}}> &nbsp;
Airplane <input name="type[]" class="all {{$forbiden}}" type="checkbox" value="Airplane" @if(strpos($company->type, 'Airplane')!== false) checked @endif  {{$disabled}}> &nbsp;
MY       <input name="type[]" class="all {{$forbiden}}" type="checkbox" value="MY" @if(strpos($company->type, 'MY')!== false) checked @endif  {{$disabled}}> &nbsp;
SY       <input name="type[]" class="all {{$forbiden}}" type="checkbox" value="SY" @if(strpos($company->type, 'SY')!== false) checked @endif  {{$disabled}}> &nbsp;
Licensee <input name="type[]" class="all {{$forbiden}}" type="checkbox" value="Licensee" @if(strpos($company->type, 'Licensee')!== false) checked @endif  {{$disabled}}>
</td>
</tr>
<tr>
<td>Name:</td>
<td><input type="text" name="firma3"  class="all form-field {{$forbiden}}" value="{{$company->firma3}}"  {{$disabled}}></td>
</tr>
<tr>
<td>Source:</td>
<td><input type="text" name="quelle"  class="all form-field {{$forbiden}}" value="{{$company->quelle}}"  {{$disabled}}></td>
</tr>
</tbody></table>
</fieldset>
<fieldset>
  <legend>Payment conditions:</legend>
    <table width="100%" border="0" cellspacing="5" cellpadding="0">
     <tbody>
      <tr>
      <td>BLZ/BIC:</td>
      <td><input type="text" name="blz"  class="all form-field {{$forbiden}}" value="{{$company->blz}}"  {{$disabled}}></td>
      </tr>
      <tr>
      <td>Konto/IBAN:	</td>
      <td><input type="text" name="konto"  class="all form-field {{$forbiden}}" value="{{$company->konto}}"  {{$disabled}}></td>
      </tr>
      <tr>
      <td>UID-Nummer:	</td>
      <td><input type="text" name="uid"  class="all form-field {{$forbiden}}" value="{{$company->uid}}"  {{$disabled}}></td>
      </tr>
    </tbody>
  </table>
</fieldset>
</form>
