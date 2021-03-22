<?php  
        require_once 'process.php';
             // traitement du formulaire avec btn submit
             /**simple search engine using PHP, MYSQLi, 
              * AJAX, Jquery and Bootstrap
              */
            $_output = ''; // besoin du modal

          if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {
           $user_input = $_REQUEST['numcin'];  
               
               // interroger la bd pour chercher les infos pêcheur
                 $_reqSql = "SELECT DISTINCT * FROM `tbl_pecheur`, `tbl_embarcation` 
                                           WHERE tbl_pecheur.id=tbl_embarcation.pecheur_id AND tbl_pecheur.num_cin = '$user_input'";
             $_searchResult = $mysqli->query($_reqSql); // execution requete
                 
                 /** TODO here will be stmt modal card  */
             // creer un tableau pour le modal
                 $_output .= '
                 <div class="table-responsive">
                     <table class="table table-bordered"';
             while ($_searchRow = $_searchResult->fetch_assoc()) {
                   $_output .= '
                         <tr>
                             <td><label>Nom</label></td>
                             <td>'. $_searchRow['nom'] .'</td>
                         </tr>
                     <tr>
                             <td><label>Prenom</label></td>
                             <td>'. $_searchRow['prenom'] .'</td>
                         </tr>
                         
                         ';
                 }

            $_output .= "</table></div>"; 

            echo json_encode($_output); 
          } 
        ?> <?php //fin traitement recherche ?>