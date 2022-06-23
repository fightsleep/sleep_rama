<?php
	require_once __DIR__ . '/../../../vendor/autoload.php';
	//connect db
	include('../../../service/connect_db.php');
	require ('../../../service/patients/my_function/function_date.php');
    $hn_order = $_GET['hn_order']; 
	// echo '<pre>';
	// print_r ($hn_order);
	// echo '</pre>';
	// exit();
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];
$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];	
$mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8', 
            'format' => 'A4',
            'margin_left' => 15,
            'margin_right' => 15,
            'margin_top' => 16,
            'margin_bottom' => 16,
            'margin_header' => 9,
            'margin_footer' => 9,
            'mirrorMargins' => true,

            'fontDir' => array_merge($fontDirs, [
                __DIR__ . 'vendor/mpdf/mpdf/custom/font/directory',
            ]),
            'fontdata' => $fontData + [
                'thsarabun' => [
                    'R' => 'THSarabunNew.ttf',
                    'I' => 'THSarabunNew Italic.ttf',
                    'B' => 'THSarabunNew Bold.ttf',
                    'U' => 'THSarabunNew BoldItalic.ttf'
                ]
            ],
            'default_font' => 'thsarabun',
            'defaultPageNumStyle' => 1
        ]);
$mpdf->setFooter('{PAGENO}');//ตัวรันหน้า
	
	$tableh1 = '
	<h2 style="text-align:center"> รายการอุปกรณ์ที่สั่งซื้อ </h2>
	<table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;">
	    <tr style="border:1px solid #000;">
	        <td  style="border-right:0px solid #000;padding:4px;text-align:center;"   width="15%">บริษัท</td>
	        <td  style="border-right:0px solid #000;padding:4px;text-align:center;"  width="15%">CODE</td>
	        <td  width="15%" style="border-right:0px solid #000;padding:4px;text-align:center;">ชื่อเครื่อง/รุ่น</td>
	        <td  style="border-right:0px solid #000;padding:4px;text-align:center;"  width="15%">อุปกรณ์</td>
	        <td  style="border-right:0px solid #000;padding:4px;text-align:center;" width="15%">จำนวน</td>
			<td  style="border-right:0px solid #000;padding:4px;text-align:center;" width="15%">ราคา (รวม VAT)</td>
	    </tr>
	</thead>
		<tbody>';
		//SQL ORDER & CPAP
$statement = $connection->prepare(
	"SELECT *  FROM tbl_order
	LEFT JOIN tbl_patient ON tbl_order.hn_order=tbl_patient.hn_patient  
	LEFT JOIN list_cpap ON tbl_order.cpap_code=list_cpap.cpap_code
	-- LEFT JOIN tbl_psg ON tbl_order.hn_order=tbl_psg.hn_psg
	WHERE hn_order = $hn_order AND DATE(date_cpap_order) = DATE(NOW()) 
	ORDER BY id_order DESC 
"
);
$statement->execute();
$result_order = $statement->fetchAll();

		//SQL PSGG
		$statement_psg = $connection->prepare(
			"SELECT *  FROM tbl_psg
			WHERE hn_psg = $hn_order 
			ORDER BY date_psg DESC 
			LIMIT 1
		"
		);
		$statement_psg->execute();
		$result_psg = $statement_psg->fetch(PDO::FETCH_OBJ);
$count = count($result_order);
	 if (($count) >= 1) {
		$i = 1;
		foreach ($result_order as $rs) {
			$tablebody .= '<tr style="border:0px solid #000;">
			<td style="border-right:px solid #000" align="center">'.$rs['cpap_company'].'</td>
				<td style="border-right:0px solid #000;" align="center" >'.$rs['cpap_code'].'</td>
				<td style="border-right:0px solid #000;" align="center" >'.$rs['cpap_code'].'</td>
				<td style="border-right:0px solid #000;" align="center" >'.$rs['cpap_name'].$rs['cpap_model'].'</td>
				<td style="border-right:0px solid #000;" align="center" >1</td>
				<td style="border-right:0px solid #000;" align="center" >'.$rs['cpap_selling_price'].'</td>
			</tr>';
			$i++;
		}
	}else{
		$tablebody .= '<tr style="border:0px solid #000;">
		<td style="border: right 0;px solid #000;padding:3px;text-align:center;"  >'.$i.'</td>
			<td style="border-right:0px solid #000;padding:3px;">ไม่พบข้อมูล</td>
		</tr>';
	}

//mysqli_close($conn);

$tableend1 = "</tbody>
</table>";
// print_r($result);
// $mpdf->Output();
// exit();
$body_1='
	<style>
		body{		
			  font-family: "thsarabun"; 		
		}
	</style>';
$header = '<table><tr>'
            . '<td width="70"><img src="1.png" width="100" /></td>'
            . '<td width="400" align="center"><h1>ศูนย์โรคการนอนหลับโรงพยาบาลรามาธิบดี</h1>
			<h3>Ramathibodi Hospital Sleep Disorder Center</h3>
			<p>Service ande Research since 1989</p></td></tr>'
            . '</table><hr />';
				// -------------Start $header2  -------------------------------
			$header2 ='
			<style>
			div{
				}
			table {
				border: 0.5px solid #696969;
			  border-collapse: collapse;
			  width: 100%;
			  font-size: 35px;
			}
			th, td{
				padding: 5px;   //ผลัก Border ออก 
				text-align: left;    //ตัวอักษรชิดซ้าย
			  }
			</style>
			<div class="row">
			<div class="col-12">
			<h1 style="text-align:center"> ใบสั่งซื้ออุปกรณ์ ศูนย์โรคการนอนหลับ </h1>
			</div>
			</div>
			';
			// ประกาศตัวแปรที่ใช้ทั้งหมดในหน้า Print Order
			$hn_order1 = $result_psg->hn_psg;
			$date_psg = DateThai($result_psg->date_psg);
			$ahi = $result_psg->ahi;
// -------------Start  $patient_profile -------------------------------
			if (($count) >= 1) {
			foreach ($result_order as $body1) {
			$patient_profile = '<table>'.
			// แถวที่ 1
			'<tr><td width="400" align="left"><p>ชื่อ-สกุลผู้ป่วย :'. $body1['firstname'].'&nbsp;'. $body1['lastname'] .'</p></td>'.
			'<td width="400" align="left"><p>HN :'. $body1['hn_order'] .'</p></td>'. 
			'<td width="400" align="left"><p>สิทธิ์การรักษา :'. $body1['claim'] .'</p>
			</td></tr>'. 
			//แถวที่ 2
			'<tr><td width="400" align="left"><p>วันที่สั่งซื้อ :&nbsp;'. DateThai($body1['date_cpap_order']).'</p></td>'.
			'<td width="400" align="left"><p>สั่งซื้อครั้งที่ :&nbsp;'. $body1['buy_count_order'] .'</p></td>'. 
			'<td width="400" align="left"><p>ค่าแรงดันที่ผู้ป่วยต้องใช้ :'. $body1['pressure_order'] .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CmH2O'.'</p>
			</td></tr>'.
			//แถวที่ 3
			'<tr><td width="400" align="left"><p>วันที่ตรวจล่าสุด :&nbsp;'.$date_psg.'</p></td>'.
			'<td width="400" align="left"><p>AHI :&nbsp;'.$ahi.'</p></td>'. 
			'<td width="400" align="left"><p>Min. SpO2 :'. $body1['pressure_order'] .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%'.'</p>
			</td></tr>'.
			//แถวที่ 4
			'<tr><td width="400" align="left"><p>แพทย์สั่งซื้อ :&nbsp;'. $body1['date_cpap_order'].'</p></td>'.
			'<td width="400" align="left"><p>รูปแบบสั่งซื้อ :&nbsp;'. $body1['amount_order'] .'</p></td>'. 
			'<td width="400" align="left"><p>แพทย์อนุมัติ :'. $body1['pressure_order'] .'</p>
			</td></tr>'
            . '</table>';
			}
	}else{   //ถ้าไม่มีข้อมูล
		$patient_profile = '<table><tr>'
		. '<td width="400" align="center"><h4>ไม่มีข้อมูล</h4>
		</td></tr>'
		. '</table>';
	}
		// ------------- end patient_profile -------------------------------

$tablebody3 .= '  <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
<label for="vehicle1"> ชำรุด</label><br>
<input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
<label for="vehicle2">ไม่ชำรุด</label><br>
<input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
<label for="vehicle3"> I have a boat</label><br><br>';
// }

$mpdf->WriteHTML($header);
 $mpdf->WriteHTML($header2);
 $mpdf->WriteHTML($patient_profile);
 $mpdf->WriteHTML($tableh1);
 $mpdf->WriteHTML($tablebody);
$mpdf->WriteHTML($tableend1);
$mpdf->WriteHTML($body_1);
$mpdf->WriteHTML($tablebody3); // sign
//$output = 'fordev22.com';
$mpdf->Output($output, 'I');
?>