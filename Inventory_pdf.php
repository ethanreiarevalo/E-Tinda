<?php
session_start();
$storename = $_SESSION['store_name'];
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'e_tinda';
$Today=date('Y-m-d');

$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, "e_tinda") ;
require "fpdf/fpdf.php";
// $db = new PDO('mysql:host=localhost;dbname=e_tinda','root','');

class myPDF extends FPDF{
    function header(){
        $this->SetFont('Arial','B',17);
        $this->Cell(190,5,'E-Tinda',0,0,'C');
        $this->Ln();
        $this->SetFont('Arial','B',14);
        $this->Cell(190,5,'Inventory',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(190,10,'Your Product Inventory',0,0,'C');
        $this->Ln(20);
    }

    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

    }

    // function headerTable(){
    //     $this->SetFont('Times','B',12);
    //     $this->Cell(100,10,'Product',1,0,'C');
    //     $this->Cell(55,10,'Stock',1,0,'C');
    //     $this->Cell(55,10,'Capital Price',1,0,'C');
    //     $this->Cell(55,10,'Selling Price',1,0,'C');
    //     $this->Ln();
    // }

    // function viewTable($db){
 
    //     $this->SetFont('Times','',12);
    //     $stmt = $db->query('select itemName,stock,capital, sellingPrice from `juanito sarisari store`');
    //     while($data = $stmt->fetch(PDO::FETCH_OBJ)){
    //         $this->Cell(100,10,$data->itemName,1,0,'C');
    //         $this->Cell(55,10,$data->stock,1,0,'C');
    //         $this->Cell(55,10,$data->capital,1,0,'C');
    //         $this->Cell(55,10,$data->sellingPrice,1,0,'C');
    //         $this->Ln();
    //     }
    // }



}

// $pdf = new myPDF();
// $pdf->AliasNbPages();
// $pdf->AddPage('L','A4',0);
// $pdf->headerTable();
// $pdf->viewTable($db);
// $pdf->Output();
$display_heading = array('itemid'=>'ID','itemName'=>'Item Name', 'stock'=> 'Stock', 'capital'=> 'Capital','sellingPrice'=> 'Selling Price','dateModified'=>'Date Modified');
$result = mysqli_query($con, "SELECT itemid,itemName,stock,capital, sellingPrice, dateModified FROM `$storename`") or die("database error:". mysqli_error($con));
$header = mysqli_query($con, "SHOW columns FROM `$storename`");
 
$pdf = new myPDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
foreach($header as $heading) {
$pdf->Cell(31,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(31,12,$column,1);
}
$pdf->Output();
?>