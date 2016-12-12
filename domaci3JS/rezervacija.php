<?php
require "php/config.php";
require "korisnik/template/header.php";
?>
   <div class="row">

     <div class="row_header">
       <h1>Rezervišite knjigu</h1>
       <br>
     </div>
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height:480px;">

                 <div class="post2">
                   <?php
                       if(isset($_GET['poruka'])) {
                           $staPrikazati = $_GET['poruka'];
                           if($staPrikazati == "Uspešno ste rezervisali knjigu! ") {
                           ?>    <div class="alert alert-info alert-dismissible" role="alert">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <strong> <?php echo $staPrikazati  ?> </strong>
                                </div>
                               <?php
                           }
                           else {
                             ?>    <div class="alert alert-success alert-dismissible" role="alert">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <strong> <?php echo $staPrikazati  ?></strong>
                           </div>
                           <?php
                          }
                       }
                   ?>


                     <?php
                         $url = 'http://localhost/domaci3JS/knjiga.json';
                         $curl = curl_init($url);
                         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                         curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
                         curl_setopt($curl, CURLOPT_HTTPGET, true);

                         $curl_odgovor = curl_exec($curl);
                         curl_close($curl);
                         $json_objekat = json_decode($curl_odgovor);
                     ?>
                     <div class="datagrid" style="max-height:500px;">
                         <table id="listaKnjiga">
                             <thead>
                                 <tr>
                                     <th>Naziv knjige</th>
                                     <th>Izdanje</th>
                                     <th>Tiraž</th>
                                     <th>Ime i prezime pisca</th>
                                     <th>Rezervacija</th>
                                 </tr>
                             </thead>
                             <tbody id="ajaxPodaci">
                                 <?php
                                     foreach($json_objekat->knjiga as $knjiga) {
                                         echo "<tr>
                                                 <td>$knjiga->knjigaNaziv</td>
                                                 <td>$knjiga->knjigaIzdanje</td>
                                                 <td>$knjiga->knjigaTiraz</td>
                                                 <td>$knjiga->pisacIme $knjiga->pisacPrezime</td>";

              if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                          if($_SESSION['status']=='Admin'){
                                                echo " <td><button class='btn btn-primary disabled'>Rezerviši</button></td>
                                             </tr>";
                                     }

                          else{
                              $dugme=0;


                              $urlZaSB = 'http://localhost/domaci3JS/rezervacija.json';
                              $curlZaSB = curl_init($urlZaSB);
                              curl_setopt($curlZaSB, CURLOPT_RETURNTRANSFER, true);
                              curl_setopt($curlZaSB, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
                              curl_setopt($curlZaSB, CURLOPT_HTTPGET, true);
                              $curl_odgovorSB = curl_exec($curlZaSB);
                              curl_close($curlZaSB);
                              $odgovorOdServisa = json_decode($curl_odgovorSB);

                              foreach($odgovorOdServisa->rezervacija as $rezervacija) {

                                if($rezervacija->knjigaID==$knjiga->knjigaID){
                                        echo " <td><button  class='btn btn-primary disabled'>Rezerviši</button></td>
                                             </tr>";
                                             $dugme=1;

                                }
                            }

                                  if($dugme==0){

                                    echo " <td><a href='insertRez.php?knjigaID=". $knjiga->knjigaID ."'><button  class='btn btn-primary'>Rezerviši</button></a></td>
                                             </tr>";

                                      }
                                     }
                                   }
                                   else{
                                    echo " <td><button  class='btn btn-primary disabled'>Rezerviši</button></td>
                                             </tr>";
                                           }

                                 }
                                 ?>
                             </tbody>
                         </table>
                     </div>

                    </div>
            </div>
   </div>
<br><br><br><br><br><br>
}
<?php require "korisnik/template/footer.php"; ?>
