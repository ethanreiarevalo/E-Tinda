<?php
session_start();
$storename = $_SESSION['store_name'];
require "fpdf/fpdf.php";
$db = new PDO('mysql:host=localhost;dbname=e_tinda','root','');
$sql = "SELECT itemName, stock, capital, ";
class myPDF extends FPDF{
    function header(){
        $this->SetFont('Arial','B',17);
        $this->Cell(276,5,'E-Tinda',0,0,'C');
        $this->Ln();
        $this->SetFont('Arial','B',14);
        $this->Cell(276,5,'Inventory',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276,10,'Your Product Inventory',0,0,'C');
        $this->Ln(20);
    }

    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

    }

    function headerTable(){
        $this->SetFont('Times','B',12);
        $this->Cell(100,10,'Product',1,0,'C');
        $this->Cell(55,10,'Stock',1,0,'C');
        $this->Cell(55,10,'Capital Price',1,0,'C');
        $this->Cell(55,10,'Selling Price',1,0,'C');
        $this->Ln();
    }

    function viewTable($db){
        
       
        
        $this->SetFont('Times','',12);
        $stmt = $db->query($sql);
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $this->Cell(100,10,$data->itemName,1,0,'C');
            $this->Cell(55,10,$data->stock,1,0,'C');
            $this->Cell(55,10,$data->capital,1,0,'C');
            $this->Cell(55,10,$data->sellingPrice,1,0,'C');
            $this->Ln();
        }
    }



}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();

?>