<!-- footer content -->
<footer>
    <div class="pull-right">
      Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
</div>
</div>
<script type="text/javascript">
  var qrcode = new QRCode(document.getElementById("qrcode"), {
    width : 100,
    height : 100
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
@include('code_foot')
</body>
</html>