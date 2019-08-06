<?php
define('DIR', '../');
require_once DIR . 'config.php';
require('../app/fpdf/fpdf.php');
$pdf =new FPDF('P','mm','A4');
$pdf->AddPage();
$control = new Controller();  
$control->notLogged('student', '../index');
$student = new Student();

$bid = $_SESSION['student'];
$res = $student->get_project_batch();
$fd=$res['faculty_id'];
$tle=$student->getTitle($res['title_id']);

$rest = $student->get_pbatch($bid);
$stmt = $student->get_pgroup($bid);
$rst = $student->get_pfac($res['faculty_id']);

$phase = $res['phase'];
$sdate = $res['sdate'];
$edate = $res['edate'];
$faculty_id = $res['faculty_id'];
$dp=$rst['dept'];

$date = Date('Y-m-d');

$ndate = date('Y-m-d', strtotime("+10 day", strtotime($edate)));

$batchid = $_SESSION['student'];
$i=0;
$n='';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
{
    $n=$n.$row['tname'].',';
    $i++;
}
?>
<?php
//$pdf->SetMargins(2.54,1.25,2.54);
$pdf->SetFont('Times','B','18');
$pdf->Cell(190,10,'YENEPOYA INSTITUTE OF TECHNOLOGY',0,1,'C');
$pdf->SetFont('Times','B','11');
$pdf->Cell(190,10,'THODAR, MIJAR POST, MOODBIDRI-574225',0,1,'C');
$pdf->Cell(190,10,'(Affiliated to Visvesvaraya Technological University, Belagavi)',0,1,'C');
$pdf->Cell(190,10,'',0,1,'C');
$pdf->SetFont('Times','B','14');
if($dp=="CS")
{
    $d='COMPUTER SCIENCE AND ENGINEERING';
}
else if($dp=="EE")
{
    $d='ELECTRICAL AND ELECTRONIC ENGINEERING';
}
else if($dp=="ME")
{
    $d='MECHANICAL ENGINEERING';
}
else if($dp=="CV")
{
    $d='CIVIL ENGINEERING';
}
$pdf->Cell(190,10,'DEPARTMENT OF '.$d,0,1,'C');
$pdf->Cell(190,35,$pdf->Image('../app/fpdf/logo.PNG',75,60),0,1,'C');
$pdf->SetFont('Times','BU','20');
$pdf->Cell(190,10,'CERTIFICATE',0,1,'C');
$pdf->Cell(190,15,'',0,1,'C');
$pdf->SetFont('Times','','12');
$a='This is to certify that the internship report entitled "'.$tle['name'].'" is an authentic record of the work carried out by '.$n.' students of 8th semester in partial fulfilment of requirements for the award of Bachelor\'s Degree in Computer Science & Engineering prescribed by Visvesvaraya Technological University ';
$pdf->MultiCell(180,8,$a,'J');
$pdf->SetFont('Times','B','12');
$pdf->Cell(190,10,'',0,1,'C');
$pdf->Cell(100,10,'..........................................................',0,0,'L');
$pdf->Cell(90,10,'..........................................................',0,1,'R');
$pdf->Cell(130,10,'              Prof. '.$rst['name'],0,0,'L');
$pdf->Cell(90,10,'               Principal',0,1,'L');
$pdf->SetFont('Times','','12');
$pdf->Cell(130,10,'               project Guide',0,1,'L');
$pdf->Cell(190,10,'',0,1,'C');
$pdf->SetFont('Times','B','14');
//$pdf->Cell(34,20,'Internal Marks:',0,0,'L');
//$pdf->SetFont('Times','BU','14');
//$pdf->Cell(190,20,'        60          ',0,1,'L');
$pdf->SetFont('Times','B','14');
$pdf->Cell(100,20,'External Viva',0,0,'L');$pdf->Cell(90,20,'Signature with date',0,1,'R');
$pdf->Cell(100,10,'1.',0,1,'L');
$pdf->Cell(100,20,'2.',0,1,'L');
$pdf->Output();
?>