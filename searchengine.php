<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      rel="stylesheet"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    
    
    <!-- important pour inclure le plugin jqueryUi -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <title>srpechessedhiou</title>

    <style>
        body {
            font-family: "Open Sans", sans-serif;
            color: #ffff;
            background: url("assets/img/bg.jpg") top center no-repeat;
            background-size: cover;
            position: relative;
            justify-content: center;
        }

                /*--------------------------------------------------------------
        # Footer
        --------------------------------------------------------------*/
        #footer {
          background: rgba(38, 55, 69, 0.4);
          padding: 30px 0;
          color: #fff;
          font-size: 14px;
          position: relative;
        }
        
        #footer .copyright {
          text-align: center;
        }
        
        #footer .credits {
          padding-top: 10px;
          text-align: center;
          font-size: 13px;
          color: #fff;
        }
        
        #footer .credits a {
          color: #36d8c3;
        }

    </style>
</head>
<body>

    <div class="header mt-5 text-center">
        <h2>Infos détails</h2>
    </div>
    <!--<div class="list-group container mt-3" style="width: 35rem;">
      <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
        The current button
      </button>
      <button type="button" class="list-group-item list-group-item-action">A second item</button>
      <button type="button" class="list-group-item list-group-item-action">A third button item</button>
      <button type="button" class="list-group-item list-group-item-action">A fourth button item</button>
      <button type="button" class="list-group-item list-group-item-action" disabled>A disabled button item</button>
    </div>  
    --> 

</body>
</html>

<?php
        /**simple search engine using PHP, MYSQLi, 
         * AJAX, Jquery and Bootstrap
         */
        
         $_dbuser = 'root';
         $_dbpw = '';
         $_dbserver = 'localhost';
         $_dbname = 'srpechessedhiou';

         $pdo = new PDO("mysql:host=$_dbserver;dbname=$_dbname", $_dbuser, $_dbpw);

            
           $q = $_POST['numcin_txb'];
           
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
                <div class="table-responsive" style="font-size: large;">
                    <table class="table table-bordered"';
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
                            <td>0.'. $row['largeur'] .'cm</td>
                        </tr>
                        <tr>
                            <td><label>Creux</label></td>
                            <td>0.'. $row['creux'] .'cm</td>
                        </tr>
                        <tr>
                            <td><label>Nb places autorisée s</label></td>
                            <td>'. $row['capacite_places'] .'</td>
                        </tr>
                        <tr>
                            <td><label>Année de construction</label></td>
                            <td>'. $row['construction_at'] .'</td>
                        </tr>
                        
                        ';
                }

                $_output .= "</table></div>"; 

                echo $_output;

            }else{
                echo "<p>Aucune correspondance pour ce numéro dans la base !</p>";
            }
            

        ?> <?php //fin traitement recherche ?>