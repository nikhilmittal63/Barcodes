<?php
require('code128.php');

$pdf=new PDF_Code128();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

$coupoun = 200;
$count = ((($coupoun/4)*30)+40);
$text = "20-A".strtotime(date('Y-m-d H:i:s'));
$k=20;
$p=1;
for($j=40;$j<=$count;$j=$j+30){
    for($i=10;$i<=170;$i=$i+50){
        $pdf->Code128($i,$k,$text,40,15);
        $pdf->SetXY($i,$j);
        $pdf->Write(0,$text);
        if($p==32){
            $pdf->AddPage();
            $p=0;
        }
        $p++;
    }
    $k=$k+30;
}

// $pdf->Code128(10,20,$text,40,15);
// $pdf->SetXY(10,40);
// $pdf->Write(0,$text);

// $pdf->Code128(60,20,$text,40,15);
// $pdf->SetXY(60,40);
// $pdf->Write(0,$text);

// $pdf->Code128(110,20,$text,40,15);
// $pdf->SetXY(110,40);
// $pdf->Write(0,$text);

// $pdf->Code128(160,20,$text,40,15);
// $pdf->SetXY(160,40);
// $pdf->Write(0,$text);





// $pdf->Code128(10,50,$text,40,15);
// $pdf->SetXY(10,70);
// $pdf->Write(0,$text);

// $pdf->Code128(60,50,$text,40,15);
// $pdf->SetXY(60,70);
// $pdf->Write(0,$text);

// $pdf->Code128(110,50,$text,40,15);
// $pdf->SetXY(110,70);
// $pdf->Write(0,$text);

// $pdf->Code128(160,50,$text,40,15);
// $pdf->SetXY(160,70);
// $pdf->Write(0,$text);
    
$pdf->Output();
?>
