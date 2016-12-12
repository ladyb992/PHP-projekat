<?php
require 'php/config.php';
    $rezervacija;
$knjigaID = $_GET['knjigaID'];
$url='http://localhost/domaci3JS/knjiga/'.$knjigaID;

$korisnik =$_SESSION['username'];

//$url='http://localhost/domaci3JS/knjiga/'.$knjigaID;
$datum = date("Y/m/d");

    if(isset($knjigaID) && isset($korisnik) && isset($datum) ) {
        $rezervacija= '{"knjigaID": "'. $knjigaID .'","korisnik": "'.  $korisnik .'", "datum":"'. $datum .'"}';
    }
    else {
        $rezervacija = '{"Greška, nisu uneti svi podaci!"}';
    }

    $url = 'http://localhost/domaci3JS/rezervacija';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $rezervacija);

    $curl_odgovor = curl_exec($curl);
    curl_close($curl);
    $json_objekat = json_decode($curl_odgovor);

    if (isset($json_objekat)) {
        header("Location: rezervacija.php?poruka=$json_objekat->poruka");
    }
?>
