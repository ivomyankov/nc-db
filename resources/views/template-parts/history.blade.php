<table class="box box-conversation" width="100%" border="0" cellspacing="5" cellpadding="0" style="color: #666; max-width:1000px;margin-left: auto; margin-right: auto;" >
                <tbody><tr>
                  <td valign="top" width="200">Data: <b class="black_text">{{$conversation->date}}</b><br>Scheduled: <b class="black_text">{{$conversation->tage}}</b> </td>
                  <td valign="top"><b class="black_text">Conversation: </b>{{$conversation->conversation}}</td>
                  <td valign="top" width="250">Staff: <b class="black_text">{{$conversation->kontakter}}</b><br>Contact: <b class="black_text">{{$conversation['contact']->name}} {{$conversation['contact']->vorname}}</b></td>
                </tr>
            </tbody></table>
