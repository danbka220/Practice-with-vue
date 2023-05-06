<?php
    $data=json_decode(file_get_contents("php://input"), true);
    $length = sizeof($data['data']);
    $nds = (float)$data['sum'] * 0.2;

    require_once('TCPDF/tcpdf.php');
    
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
    $pdf->setPrintHeader(false);
    $pdf->SetFont('timesnrcyrmt', '', 10, '', true);
    
    $pdf->SetMargins(20,20,10);
    $pdf->AddPage();
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    
    $pdf->MultiCell(90, 16.5, $data["companyBank"], array(
        'T' => array('width' => 1, 'color' => array(0,0,0)),
        'R' => array('width' => 0, 'color' => array(0,0,0)),
        'L' => array('width' => 1, 'color' => array(0,0,0)),
        'B' => array('width' => 0, 'color' => array(0,0,0)),
     ),  'J', '', 1, '', '', false, 'T', 'T');

    $pdf->SetFont('timesnrcyrmt', '', 12, '', true);
    $pdf->Cell(90, 8.25, 'Банк получателя', array(
        'T' => array('width' => 0, 'color' => array(0,0,0)),
        'R' => array('width' => 0, 'color' => array(0,0,0)),
        'L' => array('width' => 1, 'color' => array(0,0,0)),
        'B' => array('width' => 1, 'color' => array(0,0,0)),
     ),  0, '', 0, "", 0, false, 'T', 'C');

    $pdf->SetXY(110,20);
    $pdf->Cell(25, 8.25, 'БИК', array(
        'T' => array('width' => 1, 'color' => array(0,0,0)),
        'R' => array('width' => 0, 'color' => array(0,0,0)),
        'L' => array('width' => 0, 'color' => array(0,0,0)),
        'B' => array('width' => 0, 'color' => array(0,0,0)),
     ),  2, '', 0, "", 0, false, 'T', 'C');
    $pdf->Cell(25, 16.5, 'Сч.№', array(
        'T' => array('width' => 0, 'color' => array(0,0,0)),
        'R' => array('width' => 0, 'color' => array(0,0,0)),
        'L' => array('width' => 0, 'color' => array(0,0,0)),
        'B' => array('width' => 1, 'color' => array(0,0,0)),
     ),  0, '', 0, "", 0, false, 'T', 'T');

    $pdf->SetXY(135,20);
    $pdf->Cell(0, 8.25, $data["companyBik"], array(
        'T' => array('width' => 1, 'color' => array(0,0,0)),
        'R' => array('width' => 1, 'color' => array(0,0,0)),
        'L' => array('width' => 0, 'color' => array(0,0,0)),
     ),  2, '', 0, "", 0, false, 'T', 'T');
    $pdf->Cell(0, 16.5, $data['companyBankBill'], array(
        'R' => array('width' => 1, 'color' => array(0,0,0)),
        'L' => array('width' => 0, 'color' => array(0,0,0)),
        'B' => array('width' => 1, 'color' => array(0,0,0)),
     ),  0, '', 0, "", 0, false, 'T', 'T');

    //NEW CELL --------------------------------------------------------------------------------
    $pdf->SetXY(20,44.75);

    $pdf->SetFont('timesnrcyrmt', '', 12, '', true);
    $pdf->Cell(45, 8.25, "ИНН {$data['companyInn']}", array(
        'T' => array('width' => 1, 'color' => array(0,0,0)),
        'R' => array('width' => 0, 'color' => array(0,0,0)),
        'L' => array('width' => 1, 'color' => array(0,0,0)),
        'B' => array('width' => 0, 'color' => array(0,0,0)),
     ),  0, '', 0, "", 0, false, 'T', 'C');
    $pdf->Cell(45, 8.25, "КПП {$data['companyKpp']}", array(
    'T' => array('width' => 1, 'color' => array(0,0,0)),
    'R' => array('width' => 0, 'color' => array(0,0,0)),
    'L' => array('width' => 0, 'color' => array(0,0,0)),
    'B' => array('width' => 0, 'color' => array(0,0,0)),
    ),  1, '', 0, "", 0, false, 'T', 'C');
     
    $pdf->SetXY(20,53);

    $pdf->SetFont('timesnrcyrmt', '', 10, '', true);

    $pdf->MultiCell(90, 16.5, $data['companyName'], array(
        'T' => array('width' => 0, 'color' => array(0,0,0)),
        'R' => array('width' => 0, 'color' => array(0,0,0)),
        'L' => array('width' => 1, 'color' => array(0,0,0)),
        'B' => array('width' => 0, 'color' => array(0,0,0)),
     ),  'J', '', 1, '', '', false, 'T', 'T');
    
    $pdf->SetFont('timesnrcyrmt', '', 12, '', true);
    $pdf->Cell(90, 8.25, 'Получатель', array(
        'T' => array('width' => 0, 'color' => array(0,0,0)),
        'R' => array('width' => 0, 'color' => array(0,0,0)),
        'L' => array('width' => 1, 'color' => array(0,0,0)),
        'B' => array('width' => 1, 'color' => array(0,0,0)),
        ),  2, '', 0, "", 0, false, 'T', 'C');

    $pdf->SetXY(110,44.75);

    $pdf->Cell(25, 33, 'Сч. №', array(
        'T' => array('width' => 0, 'color' => array(0,0,0)),
        'R' => array('width' => 0, 'color' => array(0,0,0)),
        'L' => array('width' => 0, 'color' => array(0,0,0)),
        'B' => array('width' => 1, 'color' => array(0,0,0)),
        ),  0, '', 0, "", 0, false, 'T', 'T');
    $pdf->Cell(0, 33, $data['companyBill'], array(
        'T' => array('width' => 0, 'color' => array(0,0,0)),
        'R' => array('width' => 1, 'color' => array(0,0,0)),
        'L' => array('width' => 0, 'color' => array(0,0,0)),
        'B' => array('width' => 1, 'color' => array(0,0,0)),
        ),  1, '', 0, "", 0, false, 'T', 'T');

    //END HEADER
    $pdf->SetFont('timesnrcyrmt_b', '', 16, '', true);
    $pdf->SetXY(20,80);
    $pdf->Cell(0,15,"Счет № {$data['invoiceNumber']} от {$data['date']}", array ('B'=> array('width'=>1,'color'=>array(0,0,0))),1);

    $pdf->SetFont('timesnrcyrmt', '', 13, '', true);
    $pdf->Cell(22.5,15,'Поставщик:', 2,1);
    $pdf->SetXY(48,100);
    $pdf->SetFont('timesnrcyrmt_b', '', 12, '', true);
    $pdf->MultiCell(0,15,"{$data['companyName']}, ИНН: {$data['companyInn']}, КПП:{$data['companyKpp']}, адрес:{$data['companyAddress']}, тел. {$data['companyNumber']}",'','L');
    $pdf->SetXY(20,110);
    $pdf->SetFont('timesnrcyrmt', '', 13, '', true);
    $pdf->Cell(22.5,15,'Клиент:', 2,1);
    $pdf->SetXY(48,115);
    $pdf->SetFont('timesnrcyrmt_b', '', 12, '', true);
    $pdf->MultiCell(0,15,"{$data['clientName']}, ИНН: {$data['clientInn']}, адрес:{$data['clientAddress']}, тел. {$data['clientNumber']}",'','L');

    $pdf->SetXY(20,125);
    $pdf->SetFont('timesnrcyrmt_b', '', 14, '', true);
    $pdf->Cell(10, 12, '№', array(
        'T' => array('width' => 0.5, 'color' => array(0,0,0)),
        'R' => array('width' => 0.5, 'color' => array(0,0,0)),
        'L' => array('width' => 0.5, 'color' => array(0,0,0)),
        'B' => array('width' => 0.5, 'color' => array(0,0,0)),
        ),  0, 'C', 0, "", '', false, 'T');
    $pdf->Cell(90, 12, 'Наименование работ, услуг', array(
        'T' => array('width' => 0.5, 'color' => array(0,0,0)),
        'R' => array('width' => 0.5, 'color' => array(0,0,0)),
        'L' => array('width' => 0.5, 'color' => array(0,0,0)),
        'B' => array('width' => 0.5, 'color' => array(0,0,0)),
        ),  0, 'C', 0, "", '', false, 'T');
    $pdf->Cell(18, 12, 'Кол-во', array(
        'T' => array('width' => 0.5, 'color' => array(0,0,0)),
        'R' => array('width' => 0.5, 'color' => array(0,0,0)),
        'L' => array('width' => 0.5, 'color' => array(0,0,0)),
        'B' => array('width' => 0.5, 'color' => array(0,0,0)),
        ),  0, 'C', 0, "", '', false, 'T');
    $pdf->Cell(16, 12, 'Ед', array(
        'T' => array('width' => 0.5, 'color' => array(0,0,0)),
        'R' => array('width' => 0.5, 'color' => array(0,0,0)),
        'L' => array('width' => 0.5, 'color' => array(0,0,0)),
        'B' => array('width' => 0.5, 'color' => array(0,0,0)),
        ),  0, 'C', 0, "", '', false, 'T');
    $pdf->Cell(20, 12, 'Цена', array(
        'T' => array('width' => 0.5, 'color' => array(0,0,0)),
        'R' => array('width' => 0.5, 'color' => array(0,0,0)),
        'L' => array('width' => 0.5, 'color' => array(0,0,0)),
        'B' => array('width' => 0.5, 'color' => array(0,0,0)),
        ),  0, 'C', 0, "", '', false, 'T');
    $pdf->Cell(0, 12, 'Сумма', array(
        'T' => array('width' => 0.5, 'color' => array(0,0,0)),
        'R' => array('width' => 0.5, 'color' => array(0,0,0)),
        'L' => array('width' => 0.5, 'color' => array(0,0,0)),
        'B' => array('width' => 0.5, 'color' => array(0,0,0)),
        ),  1   , 'C', 0, "", '', false, 'T');

    $arr = $data['data'];

    $num = 1;
    foreach($arr as $item) { //foreach element in $arr
        SetRowAtTable($pdf,$item[0],$item[1],$item[2],$item[3],$item[4],$num);
        $num +=1;
    }
    $pdf->Ln(5);
    $pdf->SetFont('timesnrcyrmt_b', '', 12, '', true);
    $pdf->Cell(154,6,'Итого, вкл. НДС 20%:',0,0,'R','','','','','T','T');
    $pdf->SetFont('timesnrcyrmt', '', 12, '', true);
    $pdf->Cell(0,6,$data['sum'],0,1,'R','','','','','T','T');
    $pdf->SetFont('timesnrcyrmt_b', '', 12, '', true);
    $pdf->Cell(154,6,'НДС 20%:',0,0,'R','','','','','T','T');
    $pdf->SetFont('timesnrcyrmt', '', 12, '', true);
    $pdf->Cell(0,6,$nds,0,1,'R','','','','','T','T');

    $pdf->Ln(10);
    $pdf->SetFont('timesnrcyrmt', '', 12, '', true);
    $pdf->Cell(0,6,"Всего наименований {$length} на сумму {$data['sum']} руб.",0,1,'L','','','','','T','T');
    $pdf->SetFont('timesnrcyrmt_b', '', 12, '', true);
    $pdf->Cell(0,6,num2str((float)$data['sum']),0,1,'L','','','','','T','T');

    $pdf->SetFont('timesnrcyrmt', '', 12, '', true);
    $pdf->Cell(0,15,'Счет за услуги', array ('B'=> array('width'=>1,'color'=>array(0,0,0))),1);

    $pdf->Ln(7);
    $pdf->MultiCell(80,10,'Генеральный директор',0,'L',0,0);
    $pdf->MultiCell(80,10,$data['companyDir'],0,'L',0,2);
    $pdf->Ln(7);
    $pdf->MultiCell(80,10,'Главный бухгалтер',0,'L',0,0);
    $pdf->MultiCell(80,10,$data['companyBuh'],0,'L',0,2);

    ob_end_clean();

    $pdf->Output(__DIR__ . '/Bill.pdf', 'F'); //OUTPUT------------------------------------------------------------

    function SetRowAtTable($pdf, $title,$count,$type,$cost,$total,$num) {
    $pdf->SetFont('timesnrcyrmt', '', 12, '', true);
    $pdf->Cell(10,8,$num,array(
        'T' => array('width' => 0.5, 'color' => array(0,0,0)),
        'R' => array('width' => 0.5, 'color' => array(0,0,0)),
        'L' => array('width' => 0.5, 'color' => array(0,0,0)),
        'B' => array('width' => 0.5, 'color' => array(0,0,0)),
        ),0,'C');
    $pdf->Cell(90, 8, $title, array(
        'T' => array('width' => 0.5, 'color' => array(0,0,0)),
        'R' => array('width' => 0.5, 'color' => array(0,0,0)),
        'L' => array('width' => 0.5, 'color' => array(0,0,0)),
        'B' => array('width' => 0.5, 'color' => array(0,0,0)),
        ),  0, 'C', 0, "", '', false, 'T');
    $pdf->Cell(18, 8, $count, array(
        'T' => array('width' => 0.5, 'color' => array(0,0,0)),
        'R' => array('width' => 0.5, 'color' => array(0,0,0)),
        'L' => array('width' => 0.5, 'color' => array(0,0,0)),
        'B' => array('width' => 0.5, 'color' => array(0,0,0)),
        ),  0, 'C', 0, "", '', false, 'T');
    $pdf->Cell(16, 8, $type, array(
        'T' => array('width' => 0.5, 'color' => array(0,0,0)),
        'R' => array('width' => 0.5, 'color' => array(0,0,0)),
        'L' => array('width' => 0.5, 'color' => array(0,0,0)),
        'B' => array('width' => 0.5, 'color' => array(0,0,0)),
        ),  0, 'C', 0, "", '', false, 'T');
    $pdf->Cell(20, 8, $cost, array(
        'T' => array('width' => 0.5, 'color' => array(0,0,0)),
        'R' => array('width' => 0.5, 'color' => array(0,0,0)),
        'L' => array('width' => 0.5, 'color' => array(0,0,0)),
        'B' => array('width' => 0.5, 'color' => array(0,0,0)),
        ),  0, 'R', 0, "", '', false, 'T');
    $pdf->Cell(0, 8, $total, array(
        'T' => array('width' => 0.5, 'color' => array(0,0,0)),
        'R' => array('width' => 0.5, 'color' => array(0,0,0)),
        'L' => array('width' => 0.5, 'color' => array(0,0,0)),
        'B' => array('width' => 0.5, 'color' => array(0,0,0)),
        ),  1   , 'R', 0, "", '', false, 'T');
    }

    function num2str($num)
{
	$nul = 'ноль';
	$ten = array(
		array('', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'),
		array('', 'одна', 'две', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять')
	);
	$a20 = array('десять', 'одиннадцать', 'двенадцать', 'тринадцать', 'четырнадцать', 'пятнадцать', 'шестнадцать', 'семнадцать', 'восемнадцать', 'девятнадцать');
	$tens = array(2 => 'двадцать', 'тридцать', 'сорок', 'пятьдесят', 'шестьдесят', 'семьдесят', 'восемьдесят', 'девяносто');
	$hundred = array('', 'сто', 'двести', 'триста', 'четыреста', 'пятьсот', 'шестьсот', 'семьсот', 'восемьсот', 'девятьсот');
	$unit = array(
		array('копейка' , 'копейки',   'копеек',     1),
		array('рубль',    'рубля',     'рублей',     0),
		array('тысяча',   'тысячи',    'тысяч',      1),
		array('миллион',  'миллиона',  'миллионов',  0),
		array('миллиард', 'миллиарда', 'миллиардов', 0),
	);
 
	list($rub, $kop) = explode('.', sprintf("%015.2f", floatval($num)));
	$out = array();
	if (intval($rub) > 0) {
		foreach (str_split($rub, 3) as $uk => $v) {
			if (!intval($v)) continue;
			$uk = sizeof($unit) - $uk - 1;
			$gender = $unit[$uk][3];
			list($i1, $i2, $i3) = array_map('intval', str_split($v, 1));
			// mega-logic
			$out[] = $hundred[$i1]; // 1xx-9xx
			if ($i2 > 1) $out[] = $tens[$i2] . ' ' . $ten[$gender][$i3]; // 20-99
			else $out[] = $i2 > 0 ? $a20[$i3] : $ten[$gender][$i3]; // 10-19 | 1-9
			// units without rub & kop
			if ($uk > 1) $out[] = morph($v, $unit[$uk][0], $unit[$uk][1], $unit[$uk][2]);
		}
	} else {
		$out[] = $nul;
	}
	$out[] = morph(intval($rub), $unit[1][0], $unit[1][1], $unit[1][2]); // rub
	$out[] = $kop . ' ' . morph($kop, $unit[0][0], $unit[0][1], $unit[0][2]); // kop
	return trim(preg_replace('/ {2,}/', ' ', join(' ', $out)));
}
 
/**
 * Склоняем словоформу
 * @author runcore
 */
function morph($n, $f1, $f2, $f5) 
{
	$n = abs(intval($n)) % 100;
	if ($n > 10 && $n < 20) return $f5;
	$n = $n % 10;
	if ($n > 1 && $n < 5) return $f2;
	if ($n == 1) return $f1;
	return $f5;
}