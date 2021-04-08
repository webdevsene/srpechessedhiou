<?php
        /**simple search engine using PHP, MYSQLi, 
         * AJAX, Jquery and Bootstrap
         */
        
         $_dbuser = 'root';
         $_dbpw = '';
         $_dbserver = 'localhost';
         $_dbname = 'srpechessedhiou';

         $pdo = new PDO("mysql:host=$_dbserver;dbname=$_dbname", $_dbuser, $_dbpw);

         // condition tertiaire
         //  TODO $q = isset($_post['numcin_txb']) ? $_POST['numcin_txb'] : '';
         
         $q = $_POST['numcin_txb'] ;
           
           // simple sql query that we will be running
           $_reqSql = "SELECT DISTINCT * FROM `tbl_pecheur`, `tbl_embarcation` 

                    WHERE tbl_pecheur.num_cin LIKE '%$q%' AND tbl_pecheur.id=tbl_embarcation.pecheur_id";

            #var_dump($q);

            // prepare our SELECT stmt
            $stmt = $pdo->prepare($_reqSql);

            // bind the $q variable to :num_cin parameeter
            $stmt->bindValue(':num_cin', $q);

            $stmt->execute(); 

            $pound = $stmt->rowCount();

            $_output = '';

            if ($pound > 0) {
                
                $_output .= '
                <div class="table-responsive" style="font-size: small;">
                    <table class="table table-bordered">';
                while ($row = $stmt->fetch()) {
                  $_output .= '
                        <tr>
                            <td><label>Numéro de matricule</label></td>
                            <td>'. $row['num_immatriculation'] .'</td>
                        </tr>
                        <tr>
                            <td><label>CIN / NIN</label></td>
                            <td>'. $row['num_cin'] .'</td>
                        </tr>
                        <tr>
                            <td><label>Nom</label></td>
                            <td>'. $row['nom'] .'</td>
                        </tr>
                        <tr>
                            <td><label>Prenom</label></td>
                            <td>'. $row['prenom'] .'</td>
                        </tr>
                        <tr>
                            <td><label>Profession</label></td>
                            <td>'. $row['profession'] .'</td>
                        </tr>
                        <tr>
                            <td><label>Adresse</label></td>
                            <td>'. $row['adresse'] .'</td>
                        </tr>
                        <tr>
                            <td><label>Port attache</label></td>
                            <td>'. $row['port_attache'] .'</td>
                        </tr>
                        <tr>
                            <td><label>Numéro Tel</label></td>
                            <td>'. $row['num_tel'] .'</td>
                        </tr>
                        <tr>
                            <td><label>Nom embarcation</label></td>
                            <td>'. $row['nom_embarcation'] .'</td>
                        </tr>
                        <tr>
                            <td><label>Type de materiaux</label></td>
                            <td>'. $row['type_materiaux'] .'</td>
                        </tr>
                        <tr>
                            <td><label>Systeme mécanique</label></td>
                            <td>'. $row['systeme_mecanique'] .'</td>
                        </tr>
                        <tr>
                            <td><label>Longueur (m)</label></td>
                            <td>'. $row['longueur'] .'</td>
                        </tr>
                        <tr>
                            <td><label>Largeur</label></td>
                            <td>0.'. $row['largeur'] .'m</td>
                        </tr>
                        <tr>
                            <td><label>Creux</label></td>
                            <td>0.'. $row['creux'] .'m</td>
                        </tr>
                        <tr>
                            <td><label>Nb places autorisée s</label></td>
                            <td>'. $row['capacite_places'] .'</td>
                        </tr>
                        <tr>
                            <td><label>Année de construction</label></td>
                            <td>'. date('Y M, d', strtotime($row['construction_at'])) .'</td>
                        </tr>
                        
                        ';
                }

                $_output .= "</table></div>"; 

                echo $_output;

                #header('location: touslespecheurs.php', true);

            }else{
                $_output .="<h2>Aucune correspondance pour ce numéro dans la base !</h2>";
                echo $_output;
            }

        ?> <?php //fin traitement recherche ?>