<table class="box box-conversation" width="100%" border="0" cellspacing="5" cellpadding="0" style="color: #666;">
                <tbody><tr>
                  <td valign="top" width="220">Data: <b class="black_text">{{$conversation->date}}</b><br>Contact: <b class="black_text">{{$conversation->kontakter}} {{$conversation->name}} {{$conversation->vorname}}</b></td>
                  <td valign="top">Conversation: <b class="black_text"></b>{{$conversation->conversation}}</td>
                  <td valign="top" width="210">Staff: <b class="black_text">{{$conversation->kontakter}}</b><br>Scheduled: <b class="black_text">{{$conversation->tage}}</b></td>
                </tr>
            </tbody></table>
