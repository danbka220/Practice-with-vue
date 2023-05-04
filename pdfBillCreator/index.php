<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/vue@next"></script>
    <title>Генератор счетов</title>
</head>
<body>
    
</body>
<?php

    require_once('TCPDF/tcpdf.php');
    
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
    $pdf->setPrintHeader(false);
    $pdf->SetFont('timesnrcyrmt', '', 14, '', true);
    
    $pdf->SetMargins(20,20,10);
    $pdf->AddPage();
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    
    $pdf->Cell(75, 16.5, 'Московский кредитный банк', array(
        'T' => array('width' => 1, 'color' => array(0,0,0)),
        'R' => array('width' => 0, 'color' => array(0,0,0)),
        'L' => array('width' => 1, 'color' => array(0,0,0)),
        'B' => array('width' => 0, 'color' => array(0,0,0)),
     ),  2, '', 0, "", 0, false, 'T', 'T');
    $pdf->Cell(75, 8.25, 'Банк получателя', array(
        'T' => array('width' => 0, 'color' => array(0,0,0)),
        'R' => array('width' => 0, 'color' => array(0,0,0)),
        'L' => array('width' => 1, 'color' => array(0,0,0)),
        'B' => array('width' => 1, 'color' => array(0,0,0)),
     ),  0, '', 0, "", 0, false, 'T', 'T');

    $pdf->SetXY(95,20);
    $pdf->Cell(30, 8.25, 'БИК', array(
        'T' => array('width' => 1, 'color' => array(0,0,0)),
        'R' => array('width' => 0, 'color' => array(0,0,0)),
        'L' => array('width' => 0, 'color' => array(0,0,0)),
        'B' => array('width' => 0, 'color' => array(0,0,0)),
     ),  2, '', 0, "", 0, false, 'T', 'T');
    $pdf->Cell(30, 16.5, 'Сч.№', array(
        'T' => array('width' => 0, 'color' => array(0,0,0)),
        'R' => array('width' => 0, 'color' => array(0,0,0)),
        'L' => array('width' => 0, 'color' => array(0,0,0)),
        'B' => array('width' => 1, 'color' => array(0,0,0)),
     ),  0, '', 0, "", 0, false, 'T', 'T');

    $pdf->SetXY(125,20);
    $pdf->Cell(0, 8.25, '123154641', array(
        'T' => array('width' => 1, 'color' => array(0,0,0)),
        'R' => array('width' => 1, 'color' => array(0,0,0)),
        'L' => array('width' => 0, 'color' => array(0,0,0)),
     ),  2, '', 0, "", 0, false, 'T', 'T');
    $pdf->Cell(0, 16.5, '123154641', array(
        'R' => array('width' => 1, 'color' => array(0,0,0)),
        'L' => array('width' => 0, 'color' => array(0,0,0)),
        'B' => array('width' => 1, 'color' => array(0,0,0)),
     ),  0, '', 0, "", 0, false, 'T', 'T');

    //NEW CELL --------------------------------------------------------------------------------
     $pdf->SetXY(20,44.75);

    $pdf->Cell(75, 16.5, 'Московский кредитный банк', array(
        'T' => array('width' => 1, 'color' => array(0,0,0)),
        'R' => array('width' => 0, 'color' => array(0,0,0)),
        'L' => array('width' => 1, 'color' => array(0,0,0)),
        'B' => array('width' => 0, 'color' => array(0,0,0)),
     ),  2, '', 0, "", 0, false, 'T', 'T');
    $pdf->Cell(75, 8.25, 'Банк получателя', array(
        'T' => array('width' => 0, 'color' => array(0,0,0)),
        'R' => array('width' => 0, 'color' => array(0,0,0)),
        'L' => array('width' => 1, 'color' => array(0,0,0)),
        'B' => array('width' => 1, 'color' => array(0,0,0)),
     ),  0, '', 0, "", 0, false, 'T', 'T');

    $pdf->SetXY(95,44.75);
    $pdf->Cell(30, 8.25, 'БИК', array(
        'T' => array('width' => 1, 'color' => array(0,0,0)),
        'R' => array('width' => 0, 'color' => array(0,0,0)),
        'L' => array('width' => 0, 'color' => array(0,0,0)),
        'B' => array('width' => 0, 'color' => array(0,0,0)),
     ),  2, '', 0, "", 0, false, 'T', 'T');
    $pdf->Cell(30, 16.5, 'Сч.№', array(
        'T' => array('width' => 0, 'color' => array(0,0,0)),
        'R' => array('width' => 0, 'color' => array(0,0,0)),
        'L' => array('width' => 0, 'color' => array(0,0,0)),
        'B' => array('width' => 1, 'color' => array(0,0,0)),
     ),  0, '', 0, "", 0, false, 'T', 'T');

    $pdf->SetXY(125,44.75);
    $pdf->Cell(0, 8.25, '123154641', array(
        'T' => array('width' => 1, 'color' => array(0,0,0)),
        'R' => array('width' => 1, 'color' => array(0,0,0)),
        'L' => array('width' => 0, 'color' => array(0,0,0)) ,
     ),  2, '', 0, "", 0, false, 'T', 'T');
    $pdf->Cell(0, 16.5, '123154641', array(
        'B' => array('width' => 1, 'color' => array(0,0,0)),
        'R' => array('width' => 1, 'color' => array(0,0,0)),
        'L' => array('width' => 0, 'color' => array(0,0,0)),
    ),  0, '', 0, "", 0, false, 'T', 'T');

    ob_end_clean();
    
    $pdf->Output(__DIR__ . '/Bill.pdf', 'I');
        
    ?>
</html>
