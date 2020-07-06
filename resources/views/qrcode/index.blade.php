<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>QR Code</title>

    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
@include('../code_head')
  </head>
<body id="full" style="background-color: white;">
  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel ew">
        <div class="x_title">
          <h2>@yield('board')</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><button type="button" class="btn btn-primary" onclick="goFullScreen()">Fullscreen</button>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="row">
            <div class="col-md-6">
                <div id="qrcode" style="width:300px; height:300px; margin-top:15px;"></div>
            </div>
            <div class="col-md-6">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Tgl</th>
                        <th>Waktu</th>
                        <th>Keterangan</th>
                        <th>NIK</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $rsKar)
                        <tr>
                          <td>{{$rsKar->tgl}}</td>
                          <td>{{$rsKar->waktu}}</td>
                          <td>{{$rsKar->keterangan}}</td>
                          <td>{{$rsKar->nik}}</td>
                        </tr>    
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>


{{-- <input id="text" type="text" value="" style="width:100%" /><br />     --}}
<!-- /footer content -->
</div>
</div>
<script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode"), {
  width : 300,
  height : 300
});

// function makeCode () {		
//   var elText = document.getElementById("text");
  
//   if (!elText.value) {
//     alert("Input a text");
//     elText.focus();
//     return;
//   }
  
//   qrcode.makeCode(elText.value);
// }

// makeCode();

// $("#text").
//   on("blur", function () {
//     makeCode();
//   }).
//   on("keydown", function (e) {
//     if (e.keyCode == 13) {
//       makeCode();
//     }
//   });
</script>
<script>
  $(document).ready(function(){
    qrcode.makeCode("{!!$qrstring->qrcode!!}");
  })
  
  function makeid(length){
    var result ='';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for(var i = 0; i<length; i++){
      result += characters.charAt(Math.floor(Math.random()*charactersLength));
    }
    return result;
  }

  function myFunction(){
      setInterval(function(){
        $.ajax({
          url: '{{url('/qrcode/cek')}}',
          method: 'get',
          success: function(data) {
            console.log(data);
            if(data.status==1){
              //random
              var strqr = makeid(8);

              // $("#text").val(strqr);
              // var e = $.Event( "keypress", { which: 13 } );
              // $('#text').trigger(e);
              qrcode.makeCode(strqr);

              $.ajax({
                url: '{{url('/qrcode/update')}}',
                method: 'post',
                data: { qr: strqr, "_token": "{{csrf_token()}}", id: data.id },
                success: function(dt){
                  console.log(dt);
                }, error: function(err){
                  console.log(err);
                }
              })
            }
          },
          error: function(err){
            console.log(err);
          }
        });
      },15000);
  }
  myFunction()
</script>
@include('../code_foot')
</body>
</html>