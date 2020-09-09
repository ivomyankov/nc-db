<fieldset class="{{$hidden}}">
    <legend>Contact ID: <b style="cursor:pointer; color:green;" onclick="toggle(0)" id="id_contact0" >NEW</b></legend>
      <div id="contact0" class="contacts hidden">
      <form id="formContact0" action="/Laravel/nc-db/public/company/{{$company->id}}" method="post">
        @csrf
    <table cellspacing="2" cellpadding="0" border="0" >
  <tbody>
  <tr>
    <td width="131">Title: </td>
    <td width="415" align="center"><input hidden name="company_id" type="text" value="{{$company->id}}" >
    Mrs: <input name="anrede" class="radio" type="radio" value="frau" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Mr:  <input name="anrede" class="radio" type="radio" value="herr" >
    </td>
  </tr>
  <tr>
    <td>Name: </td>
    <td><input type="text" name="name" id="name" value="" class="form-field"></td>
  </tr>
  <tr>
    <td>Forename:  </td>
    <td><input type="text" name="vorname" id="vorname" value="" class="form-field"> </td>
  </tr>
  <tr>
    <td>Position:</td>
    <td><input type="text" name="function" id="function" value="" class="form-field"></td>
  </tr>
    <tr>
    <td>Department: </td>
    <td><input type="text" name="abteilung" id="abteilung" value="" class="form-field"></td>
  </tr>
  <tr>
    <td>Phone: </td>
    <td><input type="text" name="telefon_dw" id="telefon_dw" value="" class="form-field"></td>
  </tr>
  <tr>
    <td>Fax: </td>
    <td><input type="text" name="telefax_dw" id="telefax_dw" value="" class="form-field"></td>
  </tr>
  <tr>
    <td>e-Mail: </td>
    <td><input type="email" name="email_kontakt" id="email_kontakt" value="" class="form-field"></td>
  </tr>
  <tr>
    <td>Mobile phone: </td>
    <td><input type="text" name="mobil" id="mobil" value="" class="form-field"></td>
  </tr>
  <tr>
    <td width="140">Newsletter: </td>
    <td width="355" align="center">
    Yes: <input name="nl" id="nl1" type="radio" class="radio" value="ja"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    No: <input name="nl" id="nl2" type="radio" class="radio" value="nein">
    </td>
  </tr>
  <tr>
    <td>Approval on: </td>
    <td align="center"></td>
  </tr>
  <tr>
    <td>Language: </td>
    <td align="center">
    	DE <input name="sprache[]" type="checkbox" value="de"> &nbsp;&nbsp;&nbsp;&nbsp;
      BG <input name="sprache[]" type="checkbox" value="bg"> &nbsp;&nbsp;&nbsp;&nbsp;
		  EN <input name="sprache[]" type="checkbox" value="en"> &nbsp;&nbsp;&nbsp;&nbsp;
		  FR <input name="sprache[]" type="checkbox" value="fr">
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center" style="padding:15px;"><button class="btn btn-primary btn-sm">Add Contact</button></td>
  </tr>
  </tbody></table>
  </form>
  </div>
    </fieldset>
