<?php

require_once('TCPDF/tcpdf.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setPrintHeader(false);
$pdf->SetFont('timesnrcyrmt', '', 14, '', true);

$pdf->SetMargins(20,20,10);
$pdf->AddPage();
$pdf->setPrintHeader(false);

$html = '
<table class="tg" style="border-collapse:collapse; border:2px solid black">
<tbody>
    <tr style="border:1px solid black; height:100px">
    <td style="border:1px solid black">МОСКОВСКИЙ КРЕДИТНЫЙ БАНК</td>
    <td style="border:1px solid black">БИК</td>
    <td style="border:1px solid black">143526435746865</td>
    </tr>
    <tr>
    <td style="border:1px solid black">Банк получателя</td>
    <td style="border:1px solid black">Сч. №</td>
    <td style="border:1px solid black">1234565341</td>
    </tr>
    <tr style="border:1px solid black">
    <td style="border:1px solid black">ИНН 6242423526362626</td>
    <td style="border:1px solid black" rowspan="3">Сч. №</td>
    <td style="border:1px solid black" rowspan="3">1234567543324567865</td>
    </tr>
    <tr style="border:1px solid black">
    <td style="border:1px solid black">ООО РАССВЕТ</td>
    </tr>
    <tr style="border:1px solid black">
    <td style="border:1px solid black">Получатель</td>
    </tr>
</tbody>
</table>';

$pdf->WriteHTMLCell(0,0,'','',$html,0,0);

$pdf->Output(__DIR__ . '/Bill.pdf', 'I');


