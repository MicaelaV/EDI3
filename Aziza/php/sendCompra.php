<?php
// AddPage (Orientacion, {PORTRAIT, LANOSCAPE}, tamaño {A3,A4,A5,LETTER, LEGAL}, rotacion)
// SetFont (Tipo {COURIER, HERLVETICA, ARIAL, TIMES, SYMBOL, ZAPOINGBATS} estilo{normal, B, U, I}, tamaño)
// Cell (ancho, alto, texto, bordes, ?, alineacion, rellenar, link)
// Write(alto, texto, link)
// OutPut (destion{I, D, F, S}, nombre_archivo, utf8)
error_reporting(0);
session_start();
require '../pdf/fpdf/fpdf.php';
// $email=$_POST['email'];


            class PDF extends FPDF
	        {
	// Cabecera de página
	         function Header()
			{
	    				// Logo
	    	     $this->Image('../img/logo4.png',85,8,35);
	    				// Arial bold 15
	    	     $this->SetFont('Times','I',20);
	   				 // Movernos a la derecha
		         $this->Cell(80);
		         $this->Cell(30,70,'Compra en establecimiento Aziza',0,0,'C'); 
		      	 $this->Ln(10);
		      	 $this->SetFont('Arial','U',15);	
		         $this->Cell(50,90,utf8_decode('Detalle de la Orden:'),0,0,'C',0);
	    				// Salto de línea
		         $this->Ln(50);
		         $this->SetFont('Arial','B',15);
		         $this->Cell(80,10,utf8_decode('Producto'),1,0,'C',0);
		         $this->Cell(40,10,utf8_decode('Precio U.'),1,0,'C',0);
		  	     $this->Cell(40,10,utf8_decode('Cantidad'),1,0,'C',0);
		   	     $this->Cell(40,10,utf8_decode('Total'),1,0,'C',0);	
	        }

			// Pie de página
			function Footer()
			{

			  $this->SetY(-50);
			  $this->SetFont('Arial','B',14);
			  $this->Cell(8,10,'IMPORTANTE:chequea tu correo, te enviamos los datos para confirmar la compra.',0,0,'L');

			  $this->SetY(-35);
			  $this->SetFont('Arial','B',15);
			  $this->Cell(0,10,'Gracias por elegirnos! ',0,0,'C');
	    		// Posición: a 1,5 cm del final
	    	  $this->SetY(-15);
	    		// Arial italic 8
	    	  $this->SetFont('Arial','I',8);
	   		 // Número de página
	    	  $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
			}
	       }

			$pdf= new PDF('P','mm','legal');
			$pdf->AliasNbPages();
		    $pdf-> AddPage();
		    $pdf-> SetFont('Arial', '', 13);
		    $pdf->Ln(10);
			
		      $totalCompra=0;
		      foreach ($_SESSION["cart"] as $key => $value) {

			    $totalCompra=$totalCompra;

				$pdf->Cell(80,10,utf8_decode(ucfirst($value["item_name"])),1,0,'C',0);
		        $pdf->Cell(40,10,utf8_decode('$'.$value["product_price"]),1,0,'C',0);
		        $pdf->Cell(40,10,utf8_decode($value["item_quantity"]),1,0,'C',0);
		        $pdf->Cell(40,10,utf8_decode('$'.$total=($value["item_quantity"] * $value["product_price"])),1,1,'C',0);
		   
	    	    $totalCompra=$totalCompra+$total;	
			 }
			//unset($_SESSION["cart"]);//borramos variable cart	
    
			$pdf-> SetFont('Arial', 'B', 15);
		  	$pdf->Cell(200,15,utf8_decode('TOTAL COMPRA: $'.$totalCompra),1,0,'C',0);
		    $pdf->Ln(10);    

		    $pdf->OutPut();
			$archivoPdf = $pdf->OutPut('','S');
  		    

			include "../email/sendEmailCompra.php";

?>