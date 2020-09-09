$(document).ready(function () {

      jQuery('#number').keypress(function (e) {
          code = e.keyCode ? e.keyCode : e.which;
          //alert(code.toString());
          if (code.toString() == 13) {
              //alert('?cmpny&id='+$('#number').val());
              window.location = 'http://localhost/Laravel/nc-db/public/company/'+$('#number').val();
          }
      });

      // Each alert shows and hides one after another delayed by 1 sec
      $.each( $(".alert"), function(index) {
          var delay = (index+2)*1000
          $(this).fadeIn(1000).delay( delay ).fadeOut(1000);
      });




}); // End document ready


$(".append").click(function () {
    var text = $(this).val();
    $('#conversation').val(function (_, val) {
        return val + text;
    });
});



$('#staffFilter, #incrementation').on('change', function () {
    historyFilter();
});

$('#kontakter').on('change', function () {
    $("option:selected").attr('selected', 'selected');
});

function historyFilter(){
  var increment = $('#incrementation option:selected').val();
  var staff = $('#staffFilter option:selected').val();
  var dateFilter = '/'+$('#from_date').val().trim()+'/'+$('#to_date').val().trim();
  dateFilter = dateFilter.replace("//", "/∞/");
  var filterUrl = increment+'/'+staff+dateFilter;

  alert(filterUrl);
  if (increment && staff && dateFilter) {
      window.location = filterUrl;
  }

  return false;
}

function SelectAll(id) {
    document.getElementById(id).focus();
    document.getElementById(id).select();
}

function toggle(x) {
  $('.contacts').hide();
  $('#contact' + x).show();
}

$('#from_date, #to_date').datepicker({
    format: 'yyyy-mm-dd',
    autoclose:true,
    todayHighlight: true,
    daysOfWeekHighlighted: "5,6"
}).on('changeDate', function(e) {
    historyFilter();
});

$('#set_date').datepicker({
    format: 'yyyy-mm-dd',
    autoclose:true,
    todayHighlight: true,
    daysOfWeekHighlighted: "5,6"
}).on('changeDate', function(e) {
    //historyFilter();
    alert($('#set_date').val().trim())
});

function filterToggle(){
  $( "#filter" ).slideToggle();
  $("#toggler").toggleClass("flip");
}

function slideToggle(name, speed){
  event.preventDefault();
  //alert(name+' / '+speed);
  //$( name ).show(speed);
  $( name ).slideToggle(speed);
}

function sendConv(company,kontakter,date,tage){
  // Ако имаме отворен контакт, взима IDто, ако е отворен нов контакт, праща ID=0
  //if($(".contacts > form").is(":visible")){}
    // извлича IDто от ID на отворената форма за контакт
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var contID = $( ".contacts > form:visible" ).attr("id").slice(11);
  if(contID==0){
    alert('Add the new contact first!');
    return;
  }
  //alert("Contact: "+ contID +' / Company# '+company+' / Tage: '+tage+' Conv:'+$('#conversation').val()+ ' / Staff:'+kontakter+' Date:'+date);

  $.ajax({
    type: "post",
    url: "http://localhost/Laravel/nc-db/public/saveconv",
    data: {
      _token: CSRF_TOKEN,
      company_id: company,
      kontakt_id: contID,
      tage: tage,
      kontakter: kontakter,
      date: date,
      conversation: $('#conversation').val()
    },
    dataType: 'JSON',
    success: function (data) {
      console.log('success:'+data);
      window.location.replace("http://localhost/Laravel/nc-db/public/company/"+company);
      //alert(data.status);
    },
    error: function (xhr, status, error) {
        alert(xhr+", "+status+", "+error);
    }
  });

  return false;

}

function send() {
  let formData = {};
  $.each( $("form:visible").serializeArray(), function(index, fieldData) {
      alert("Form: "+$( this ).attr("id"));
      if(fieldData.name.endsWith('[]')){
        let name = fieldData.name.substring(0,fieldData.name.length - 2);
        if(!(name in formData)){
          formData[name] = [];
        }
        formData[name].push(fieldData.value);
      }else {
        formData[fieldData.name] = fieldData.value;
      }
      console.log(formData);
      event.preventDefault();
    });



}

function send1() {
  $("form:visible").each(function() {
    alert("Form: "+$( this ).attr("id"));

/*
        var postData = {};
        var form = $(this).serializeArray();
        for (var i = 0; i < form.length; i++) {
            if (form[i]['name'].endsWith('[]')) {
                var name = form[i]['name'];
                name = name.substring(0, name.length - 2);
                if (!(name in postData)) {
                    postData[name] = [];
                }
                postData[name].push(form[i]['value']);
                //console.log(postData)
            } else {
                postData[form[i]['name']] = form[i]['value'];
            }
        }
        console.log(postData);
        event.preventDefault();
*/


        console.log( $( this ).serializeArray() );
        event.preventDefault();
        /*$("#"+$( this ).attr("id")+" :input").each(function(){
          var input = $(this);
                  alert('Type: ' + input.attr('type') + 'Name: ' + input.attr('name') + 'Value: ' + input.val());

        });*/

  });


/*
    var prepare = {};

    $( ".all:visible").each(function() {
      if($(this).is(':checkbox')){
        var combined = $("input[name=q"+index+"]:checked").map(function () { return this.value; }).get().join("|");
      }

      var index = $( this ).attr("id").substring(1);
      if($( this ).attr("alt")=='checkbox'){
        var combined = $("input[name=q"+index+"]:checked").map(function () { return this.value; }).get().join("|");
        if(combined !== ''){
          console.log( "q" + index + ": " + combined );
          prepare["q" + index] = combined;
        }
      }
      if($( this ).attr("alt")=='radio'){
        if($("input[name=q"+index+"]:checked").val() ){
          console.log( "q" + index +": "+ $("input[name=q"+index+"]:checked").val());
          prepare["q" + index] = $("input[name=q"+index+"]:checked").val();
          $(window).scrollTop(0);
        }
      }
      if($(this).find('.sonstiges').length !== 0 && $(this).find('.sonstiges').val() !== ''){
        console.log( "qs" + index + ": "+ $(this).find('.sonstiges').val());
        prepare["q" + index +"s"] = $(this).find('.sonstiges').val();
      }

      if($( this ).attr("alt")=='text' || $( this ).attr("alt")=='textfield'){
        if($("#q"+index).val() ){
          console.log( "q" + index +": "+ $("#q"+index).val());
          prepare["q" + index] = $("#q"+index).val();
        }
      }

      if($( this ).attr("alt")=='last'){
        var combined = $("input[name=last]").map(function () { return this.value; }).get().join("|");
        if(combined !== ''){
          console.log( "Last: " + combined );
          prepare["q" + index] = combined;
        }
      }

    });

    var encoded = JSON.stringify( prepare );
    //alert(encoded);

    $.ajax({
        type: "POST",
        url: "https://survey.mediaservices.biz/<?php echo $ids->tbl; ?>/save.php",
        data: encoded,
        success: function (data) {
            //alert(data.status);
                  $('#fieldset').fadeOut(1000, function () {
                    $('#msg').fadeIn(1000);
                  });
        },
        error: function (xhr, status, error) {
            $('#fieldset').fadeOut(1000, function () {
                $('#btn').hide();
                $('#msg2').fadeIn(1000);
            });
            alert(xhr+", "+status+", "+error);
        }
    });

    return false;
*/
}
