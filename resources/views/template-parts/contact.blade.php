<fieldset>
    <legend>Contact ID: <b style="cursor:pointer; color:green;" onclick="toggle({{$cont}})" id="id_contact{{$cont}}" >{{$contact->id}} - {{$contact->name}} {{$contact->vorname}}</b></legend>
    <div id="contact{{$cont}}" class="contacts @if($cont != 1) hidden @endif">
    <form id="formContact{{$contact->id}}" action="{{route('updateContact',['companyId' => $company->id, 'cintactId' => $contact->id])}}" method="POST">
      @method('PUT')
      @csrf
    <table cellspacing="2" cellpadding="0" border="0" >
  <tbody>
  <tr>
    <td width="131">Title: </td>
    <td width="415" align="center">
    <img src="{{ URL::asset('images/save.png') }}" class='btn {{$forbiden}} {{$hidden}}' onclick="$('#formContact{{$contact->id}}').submit();" title="Update contact" style="float: right;"></img><br>
    Mrs: <input name="anrede" class="all radio {{ $forbiden}}" type="radio" value="frau" {{$disabled}}> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Mr: <input name="anrede" class="all radio {{ $forbiden}}" type="radio" value="herr" {{$disabled}}>
    </td>
  </tr>
  <tr>
    <td>Name: </td>
    <td><input type="text" name="name" value="{{$contact->name}}" class="all form-field {{ $forbiden}}" {{$disabled}} ></td>
  </tr>
  <tr>
    <td>Forename:  </td>
    <td><input type="text" name="vorname" value="{{$contact->vorname}}" class="all form-field {{ $forbiden}}" {{$disabled}} > </td>
  </tr>
  <tr>
    <td>Position:</td>
    <td><input type="text" name="function" value="{{$contact->function}}" class="all form-field {{ $forbiden}}" {{$disabled}} ></td>
  </tr>
    <tr>
    <td>Department: </td>
    <td><input type="text" name="abteilung" value="{{$contact->abteilung}}" class="all form-field {{ $forbiden}}" {{$disabled}} ></td>
  </tr>
  <tr>
    <td>Phone: </td>
    <td><input type="text" name="telefon_dw" value="{{$contact->telefon_dw}}" class="all form-field {{ $forbiden}}" {{$disabled}} ></td>
  </tr>
  <tr>
    <td>Fax: </td>
    <td><input type="text" name="telefax_dw" value="{{$contact->telefax_dw}}" class="all form-field {{ $forbiden}}" {{$disabled}} ></td>
  </tr>
  <tr>
    <td>e-Mail: </td>
    <td><input type="text" name="email_kontakt" value="{{$contact->email_kontakt}}" class="all form-field {{ $forbiden}}" {{$disabled}} ></td>
  </tr>
  <tr>
    <td>Mobile phone: </td>
    <td><input type="text" name="mobil" value="{{$contact->mobil}}" class="all form-field" {{$disabled}} ></td>
  </tr>
  <tr>
    <td width="140">Newsletter: </td>
    <td width="355" align="center">
    Yes: <input name="nl" type="radio" class="all radio {{ $forbiden}}" value="ja" @if($contact->nl =='ja') checked @endif {{$disabled}} > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    No: <input name="nl" type="radio" class="all radio {{ $forbiden}}" value="nein" @if($contact->nl =='nein') checked @endif {{$disabled}} >
    </td>
  </tr>
  <tr>
    <td>Approval on: </td>
    <td align="center">{{$contact->genehmigung}} </td>
  </tr>
  <tr>
    <td title="de">Language: </td>
    <td align="center">
    	DE <input name="sprache[]" type="checkbox" value="de" @if(strpos($contact->sprache, 'de')!== false) checked @endif class="{{$forbiden}}" {{$disabled}} > &nbsp;&nbsp;&nbsp;&nbsp;
      BG <input name="sprache[]" type="checkbox" value="bg" @if(strpos($contact->sprache, 'bg')!== false) checked @endif class="{{$forbiden}}" {{$disabled}} > &nbsp;&nbsp;&nbsp;&nbsp;
      EN <input name="sprache[]" type="checkbox" value="en" @if(strpos($contact->sprache, 'en')!== false) checked @endif class="{{$forbiden}}" {{$disabled}} > &nbsp;&nbsp;&nbsp;&nbsp;
  		FR <input name="sprache[]" type="checkbox" value="fr" @if(strpos($contact->sprache, 'fr')!== false) checked @endif class="{{$forbiden}}" {{$disabled}} >
    </td>
  </tr>
  </tbody></table>
  </form>
  </div>
</fieldset>
