<?php 
require 'php/config.php';
require_once('TCPDF-master/config/tcpdf_config.PHP');

require_once('TCPDF-master/tcpdf.php');




  	
    	$mysqli = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db);
  	

$datumDanasnji = date('d.m.Y');
$vreme = date('H:i:s');


$pdf = new TCPDF();
$pdf -> AddPage();
$pdf -> SetFont("dejavusans", "B", "15");
$pdf -> SetRightMargin("20");
$pdf -> image("img/header1.jpg", 0,0,220,30);


			
$user = $_SESSION['username'];

$pdf -> SetFont("dejavusans", "", "13");
$pdf->MultiCell(100,20,"\n",0,"R");

$pdf->Cell(80,10,"Datum izveštaja: $datumDanasnji",0,"R");


$pdf->Cell(80,10,"Vreme izveštaja:$vreme",0,"R");
$pdf->Cell(80,10,"Admin:$user \n",0,"R");
$pdf->MultiCell(100,10,"\n",0,"R");
$pdf -> MultiCell(180, 20, "Spisak rezervacija ", 0, "C");
$pdf->MultiCell(100,0,"\n",0,"R");


 $url = 'http://localhost/domaci3JS/rez.json';
                         $curl = curl_init($url);
                         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                         curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
                         curl_setopt($curl, CURLOPT_HTTPGET, true);

                         $curl_odgovor = curl_exec($curl);
                         curl_close($curl);
                         $json_objekat = json_decode($curl_odgovor);

				$i = 100;				
				 foreach($json_objekat->rezervacija as $rezervacija) {
				$pdf -> SetFont("dejavusans", "I", "12");
				$converted_knjigaID = iconv('UTF-8', 'ASCII//TRANSLIT', $rezervacija->knjigaID);
				$converted_username = iconv('UTF-8', 'ASCII//TRANSLIT', $rezervacija->korisnik);
				$pdf -> MultiCell(185, 8, "KnjigaID: $converted_knjigaID \n","T");
				$pdf -> MultiCell(185, 8, "Naziv knjige: $rezervacija->knjigaNaziv\n");
				$pdf -> MultiCell(185, 8, "Korisnik: $rezervacija->korisnik\n");
				$pdf -> MultiCell(185, 8, "Datum: $rezervacija->datum\n");
				
				
			}
			
		
			
		
	$identifikator=$datumDanasnji."_".$_SESSION['username']."_".date('H_i_s');
$pathToSave="rezervacije/$identifikator.pdf";
$content = $pdf -> Output($pathToSave,'D');

$pdf->Close();
header("Location: index3.php")
 ?>