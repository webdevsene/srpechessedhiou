<!DOCTYPE HTML>
<html>
<head>
    <title>srpechesedhiou - Gestion des embarcations</title>
      
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      rel="stylesheet"
    />

    <style>
        body {
            font-family: "Open Sans", sans-serif;
            color: #ffff;
            background: url("assets/img/boatbg.jpg") top center no-repeat;
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
    <!--Navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">srpechessedhiou</a>        
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav"> 
                <li class="active"><a href="index.php">Accueil <span class="sr-only">(current)</span></a></li>
                <li><a href="touslespecheurs.php">Tous les pêcheurs </a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Enrollement <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                <li><a href="register.php">Enroller un pêcheur</a></li>
                <li role="separator" class="divider"></li>            
                <li><a href="createemb.php">Configurer une embarcation</a></li>
                <li role="separator" class="divider"></li>            

                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li role="separator" class="divider"></li>
              </ul>
                </li>
            </ul>
        </div>
      </div>
    </nav> <!--/.Navbar -->
    <div style="height: 40px"></div>
  
    <!-- container -->
    <div class="container">   
        <div class="page-header">
            <h1>Informations sur votre embarcation !</h1>
        </div>

    <?php
        if($_POST){ 
            // include database connection
            include 'process.php';
       
            try{

                $query = "INSERT INTO `tbl_embarcation` (pecheur_id,
                                                         num_immatriculation,
                                                         nom_embarcation,
                                                         type_materiaux,
                                                         systeme_mecanique,
                                                         longueur,
                                                         largeur,
                                                         creux,
                                                         capacite_places,
                                                         construction_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";     
                // prepare query for execution
                $stmt = $mysqli->prepare($query);
       
                // posted values
                $pecheur_id= (int)htmlspecialchars(strip_tags($_POST['npecheur'])); # recuperer l'id_pecheur en fonction du nom saisie par user
                
                $num_immatriculation=htmlspecialchars(strip_tags($_POST['nummatricule']));

                $nom_embarcation=htmlspecialchars(strip_tags($_POST['nomembarcation'])); // nomembarcation

                $type_materiaux=htmlspecialchars(strip_tags($_POST['typemateriaux']));

                $systeme_mecanique=htmlspecialchars(strip_tags($_POST['systememecanique']));

                $longueur=(int)htmlspecialchars(strip_tags($_POST['longueur']));

                $largeur=(int)htmlspecialchars(strip_tags($_POST['largeur']));

                $creux=(int)htmlspecialchars(strip_tags($_POST['creux']));

                $capacite_places=(int)htmlspecialchars(strip_tags($_POST['nbperson']));

                $construction_at=htmlspecialchars(strip_tags($_POST['anneedeconstruction']));
       
                // bind the parameters
                $stmt->bind_param('issssiiiis', $pecheur_id, $num_immatriculation, $nom_embarcation, $type_materiaux, $systeme_mecanique, $longueur, $largeur, $creux, $capacite_places, $construction_at);
               
                // Execute the query
                if($stmt->execute()){

                    echo "<div class='alert alert-success'>Enregistrement effectué avec succès.</div>";
                    sleep(5); // attendre quelque seconde avant de recharger la page
                    
                   # header('location: createemb.php'); // retourner à la page saisie

                }else{
                    echo "<div class='alert alert-danger'>Unable : l'enregistrement a échoué.</div>";
                }
            }
            // show error
            catch(PDOException $exception){
                die('ERROR: ' . $exception->getMessage());
            }
        }
    ?>

<!-- html form here where the product information will be entered -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table class='table table-responsive table-bordered' style="font-size: large;">
        <tr>
            <td><span class="fa"><i class="fas fa-user-tie"></i></span> <strong> N° matricule</strong> </td>
            <td><input type='text' name='nummatricule' class='form-control' /></td>
        </tr>
        
        <tr>
            <td>Nom embarcation</td>
            <td><input  type="text" name='nomembarcation' class='form-control'></td>
        </tr>

        <tr>
            <td>Type Matériau</td>
            <td>
                <select name="typemateriaux" id="typemateriaux" class="form-control">
                    <option name="bois" value="bois">Bois</option>
                    <option name="aluminium" value="aluminium">Aluminium</option>
                    <option name="fibredeverre" value="fibredeverre">Fibre de verre</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Système mécanique</td>
            <td>
                <select name="systememecanique" id="systememecanique" class="form-control">
                    <option name="rame" value="Rame">Rame</option>
                    <option name="voile" value="Voile">Voile</option>
                    <option name="moteur" value="Moteur 8CV">Moteur 8CV</option>
                    <option name="moteur" value="Moteur 15CV">Moteur 15CV</option>
                    <option name="moteur" value="Moteur 56CV">Moteur 56CV</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Longueur</td>
            <td><input  type="number" step="1" pattern="\d+" name='longueur' id="longueur" class='form-control'></td>
        </tr>

        <tr>
            <td>Largeur</td>
            <td><input  type="number" step="1" pattern="\d+" name='largeur' id="largeur" class='form-control'></td>
        </tr>

        <tr>
            <td>Creux</td>
            <td><input  type="number" step="1" pattern="\d+" name='creux' id="creux" class='form-control'></td>
        </tr>

        <tr>
            <td>Nombre de personnes à bord</td>
            <td><input  type="number" step="1" pattern="\d+" name='nbperson' id="nbperson" maxlength="1" class='form-control' required></td>
        </tr>

        <tr>
            <td>Année de construction</td>
            <td><input type="date" name='anneedeconstruction' id="anneedeconstruction" value="2011-08-19" class='form-control'></td>
        </tr>

        <tr>
            <td>Propriétaire</td>
            <td>
                <select name="npecheur" id="npecheur" class="form-control">
                    <option value="pick">בחר מהרשימה</option>
                    <?php 
                        require_once 'process.php'; // database cnx using pdo

                        $sql = "SELECT id, nom, prenom FROM `tbl_pecheur` order by id DESC LIMIT 5"; // requette sql

                        // Get le resultat de la requette
                        $result = $mysqli->query($sql);

                        while ($row = $result->fetch_assoc()) {                            
                            // afficher en tant que html option select
                            echo "<option value='". $row['id'] ."'>" .$row['nom'] ." " .$row['prenom'] ."</option>" ;
                         }
                    ?>
                </select>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='register.php' class='btn btn-danger'>Revenir sur la liste des pêcheurs</a>
            </td>
        </tr>
    </table>
</form>
          
</div> <!-- end .container -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>srpechessedhiou</span></strong>. Tous droits réservés !
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/"><strong>myeva.co</strong> <small> Etudes digitales</small></a>
      </div>
    </div>
  </footer><!-- End #footer -->
      
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">

    $(document).ready(function () {
 
        window.setTimeout(function() {

            $(".alert").fadeTo(1000, 0).slideUp(1000, function(){

                $(this).remove();
            });
        }, 2000);
 
    });
</script>
  
</body>
</html>