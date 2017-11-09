
<?php include 'index.php' ?>
<?php require('fpdf.php');?>

<?php

if(isset($_POST['submit']))
{
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $size = $_POST['size'];
    $coupon = $_POST['coupon'];
    for ($x = 1; $x <= $coupon; $x++) {
        $number = ($size. "-A");
        $time1=time();
        $text=$number.$time1.$x ;
        $pdf->Cell(90,12,$text,1);
        $pdf->Ln();
        
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
</script>
</head>
<body>
<form name ="login" method="post" onsubmit="validateform()"  >
Size:<input type="text" name="size" id = "size" onkeypress="javascript:return isNumber(event)"  required><br>
Coupon required: <input type="text" name="coupon" id="coupon"  onkeypress="javascript:return isNumber(event)"  required><br>
<input type="submit" name="submit">

</form>
</body>