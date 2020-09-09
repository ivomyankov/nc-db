<form id="formCompany" action="{{route('newCompany')}}" method="POST">
  @csrf
<fieldset>
  <legend>Company information:</legend>
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
<tbody><tr>
<td width="110">ID / All <input type="hidden" name="id" value=""></td>
<td><table border="0" cellspacing="0" cellpadding="0">
<tbody><tr>
<td width="105" height="52px"><img src="{{ URL::asset('images/save.png') }}" class='btn' onclick="$('#formCompany').submit();" title="Save company"></img></td>
<td width="32"></td>
<td width="110"></td>
<td width="32"></td>
<td width="105"></td>
</tr>
</tbody></table></td>
</tr>
<tr>
<td>Company:</td>
<td><input type="text" name="firma1"  class="all form-field" value="" ></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="text" name="firma2"  class="all form-field" value="" ></td>
</tr>
<tr>
<td>Street &amp; #:</td>
<td><input type="text" name="strabe"  class="all form-field" value="" ></td>
</tr>
<tr>
<td>Poste code: </td>
<td><input type="text" name="plz"  class="all form-field" value="" ></td>
</tr>
<tr>
<td>City: </td>
<td><input type="text" name="ort"  class="all form-field" value="" ></td>
</tr>
<tr>
<td>Country:</td>
<td><input type="text" name="land"  class="all form-field" value="" ></td>
</tr>
<tr>
<td>Phone:</td>
<td><input type="text" name="telefon"  class="all form-field" value="" ></td>
</tr>
<tr>
<td>Fax:</td>
<td><input type="text" name="telefax"  class="all form-field" value="" ></td>
</tr>
<tr>
<td>e-Mail:</td>
<td><input type="text" name="email"  class="all form-field" value="" ></td>
</tr>
<tr>
<td>Web:</td>
<td><input type="text" name="url"  class="all form-field" value="" ></td>
</tr>
<tr>
<td>Reqruiter:</td>
<td><input type="text" name="kontakter"  class="all form-field" value="{{Auth::user()->name}}" ><br></td>
</tr>
<tr>
<td>Vessel:</td>
<td>
 <br>
Car      <input name="type[]" class="all" type="checkbox" value="Car" > &nbsp;
Boat     <input name="type[]" class="all" type="checkbox" value="Boat" > &nbsp;
Airplane <input name="type[]" class="all" type="checkbox" value="Airplane" > &nbsp;
MY       <input name="type[]" class="all" type="checkbox" value="MY" > &nbsp;
SY       <input name="type[]" class="all" type="checkbox" value="SY" > &nbsp;
Licensee <input name="type[]" class="all" type="checkbox" value="Licensee" >
</td>
</tr>
<tr>
<td>Name:</td>
<td><input type="text" name="firma3"  class="all form-field" value="" ></td>
</tr>
<tr>
<td>Source:</td>
<td><input type="text" name="quelle"  class="all form-field" value="" ></td>
</tr>
</tbody></table>
</fieldset>
<fieldset>
  <legend>Payment conditions:</legend>
    <table width="100%" border="0" cellspacing="5" cellpadding="0">
     <tbody>
      <tr>
      <td width="110">BLZ/BIC:</td>
      <td><input type="text" name="blz"  class="all form-field" value="" ></td>
      </tr>
      <tr>
      <td>Konto/IBAN:	</td>
      <td><input type="text" name="konto"  class="all form-field" value="" ></td>
      </tr>
      <tr>
      <td>UID-Nummer:	</td>
      <td><input type="text" name="uid"  class="all form-field" value="" ></td>
      </tr>
    </tbody>
  </table>
</fieldset>
</form>
