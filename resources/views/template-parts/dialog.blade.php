<div class="{{$hidden}}">
  <br>
<label for="exampleFormControlTextarea1">Conversation:</label>
<i onclick="$('#conversation').html('').val('')" style="float:right; font-size:10px; color:#F00; cursor:pointer">Clear</i>
  <textarea class="form-control" id="conversation" rows="3" style="margin-bottom: 10px;"></textarea>
  <input hidden name="company_id" value="{{$company->id}}">
  <input hidden name="kontakt_id" value="$( '.contacts > form:visible' ).attr('id').slice(11);">
  <input hidden name="kontakter" value="{{$company->kontakter}}">
  <input hidden name="date" value="@php echo date('Y-m-d'); @endphp">
  <input id="tage" hidden name="tage" value="">
  <center>
      <button type="button" class="append btn btn-info btn-sm" value=" Nobody answers " >Nobody answers</button>
      <button type="button" class="append btn btn-info btn-sm" value=" On vacaton until " >On vacaton until</button>
      <button type="button" class="append btn btn-info btn-sm" value=" Answering mashine " >Answering mashine</button>
      <br>
      <button class="WV submit-button btn-sm" type="button" onclick="sendConv({{$company->id}}, '{{$company->kontakter}}', '@php echo date('Y-m-d'); @endphp','@php echo date('Y-m-d', strtotime('+1 days')); @endphp')" >+1 day</button>
      <button class="WV submit-button btn-sm" type="button" onclick="sendConv({{$company->id}}, '{{$company->kontakter}}', '@php echo date('Y-m-d'); @endphp','@php echo date('Y-m-d', strtotime('+7 days')); @endphp')" >+7 days</button>
      <button class="WV submit-button btn-sm" type="button" onclick="send(14)" >+14 days</button>
      <button class="WV submit-button btn-sm" type="button" onclick="wv('2020-07-30 ')" >+30 days</button>
      <button class="WV submit-button btn-sm" type="button" onclick="wv('2020-07-30 ')" >+60 days</button>
      <button class="WV submit-button btn-sm" type="button" onclick="wv('2020-07-30 ')" >+90 days</button>
      <button class="WV submit-button btn-sm" type="button" onclick="wv('2020-07-30 ')" >+120 days</button>
      &nbsp;
      <input class="form-control" id="set_date" value=" ∞ " type="text" style="width: auto; height: auto; text-align: center;">
  </center>
</div>
