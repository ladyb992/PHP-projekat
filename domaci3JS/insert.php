<?php
    $knjiga;
    if(isset($_POST['knjigaNaziv']) && isset($_POST['knjigaIzdanje']) && isset($_POST['knjigaTiraz']) &&  isset($_POST['knjigaStanje']) && isset($_POST['pisac'])) {
        $knjiga= '{"knjigaNaziv": "'. $_POST['knjigaNaziv'] .'","knjigaIzdanje": "'. $_POST['knjigaIzdanje'] .'", "knjigaTiraz":"'. $_POST['knjigaTiraz'] .'", "knjigaStanje":"'. $_POST['knjigaStanje'] .'","pisacID":"'. $_POST['pisac'] .'"}';
    }
    else {
        $knjiga = '{"Greška, nisu uneti svi podaci!"}';
    }

    $url = 'http://localhost/domaci3JS/knjiga';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $knjiga);

    $curl_odgovor = curl_exec($curl);
    curl_close($curl);
    $json_objekat = json_decode($curl_odgovor);

    if (isset($json_objekat)) {
        header("Location: insertKnjiga.php?poruka=$json_objekat->poruka");
    }
?>
