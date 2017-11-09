<?php
require('code128.php');
if(ISSET($_POST['submit'])){
$pdf=new PDF_Code128();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

$coupons = $_POST["coupon"];
$size = $_POST["size"];
$loopcount=0;
$k=20;
$l=40;
for($i=1;$i<=$coupons;){
    for($j=10;$j<=170;$j=$j+50){
        $loopcount+=1;
        if($loopcount<=$coupons){
        $text =$size."-A".strtotime(date('Y-m-d H:i:s')).$i;
        $pdf->Code128($j,$k,$text,40,15);
        $pdf->SetXY($j,$l);
        $pdf->Write(0,$text);
        $i++;
        }
    }
    $k = $k + 30;
    $l = $l + 30;
}
$pdf->Output();
}
?>   
<!Doctype>
<html>
<head>
<script>
   
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    
    function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : event.keyCode;
           if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)){
             return false;
           }
            var x=document.getElementById("coupon").value;
           console.log(x);

  if (parseInt(x,10)>32){
    
    var current = document.getElementById("coupon");
    current.value = 32;
   alert("you can generate maximum 32 coupon in one attempt!");
    return false;
  }
          return true;
       }

</script>
</head>
<body>
<form name ="login" method="post" onsubmit="validateform()"  >
Size: 
<?php
echo "<select name='size' id='size' onkeypress='javascript:return isNumber(event)'  required>";
$range = range(34,42);
foreach ($range as $cm) {
  echo "<option value='$cm'>$cm cm</option>";
}
echo "</select>";
?>
<br><br>

Coupon required: <input type="number" min="1" max="32" name="coupon" id="coupon"  onkeypress="javascript:return isNumber(event)"  required>
<font color="red">you can generate maximum 32 coupon in one attempt!</font>
<br><br>

<input type="submit" name="submit" onclick=isNumberKey(event)>

</form>
</body>
</html>

