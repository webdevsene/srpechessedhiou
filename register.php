<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>srpechessedhiou</title>

    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    
    <!-- Latest compiled and minified Bootstrap CSS 
    -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <style>
        body {
            font-family: "Open Sans", sans-serif;
            color: #fff;
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
    <?php require_once 'mn.php'; ?>

    <?php 
        require_once 'process.php'; 
    ?>

    <div class="page-header d-flex justify-content-center mt-3">
        <h1 style="margin-left: 250px;"> Informations personnelles sur Pêcheur ! </h1>
    </div>

    
<?php  
        if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>" class="form-group" role="alert" data-auto-dismiss="500">
            <i class='fas fa-check'></i>
            <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
        </div>
        <?php endif; ?>

<div class="container d-flex justify-content-center" style="width: 60rem; font-size: large;">
        <form action="process.php" method="POST" name="fpecheur" class="fpecheur">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" class="form-control" 
                            value="<?php echo $nom; ?>" placeholder="Enter votre nom">
                </div>

                <!-- -->
                <div class="form-group">
                    <label for="prenom">Prenom</label>
                    <input type="text" name="prenom" class="form-control" 
                            value="<?php echo $prenom; ?>" placeholder="Entrer votre prenom">
                </div>
            
            <!-- raison sociale -->

                <div class="form-group">
                    <label for="raisonsociale">Raison sociale</label>
                    <input type="text" name="raisonsociale" class="form-control" 
                            value="<?php echo $raisonsociale; ?>" placeholder="donner votre profession ?" required>
                </div>
        
                <!-- profession -->
                <div class="form-group">
                    <label for="profession">Profession</label>
                    <input type="text" name="profession" class="form-control" 
                            value="<?php echo $profession; ?>" placeholder="donner votre profession ?">
                </div>

            <!-- Adresse -->
            <div class="form-group">
                <label for="">Adresse</label>
                <input type="text" name="adresse" class="form-control" 
                        value="<?php echo $adresse; ?>" placeholder="quelle est votre adresse ?">
            </div>

            <!-- port d'attache -->
            <div class="form-group">
                <label for="">Port d'Attache</label>
                <input type="text" name="portattache" class="form-control" 
                        value="<?php echo $portattache; ?>" placeholder="quel est votre port d'attache ?">
            </div>

            
            <!-- departement -->
            <div class="form-group">
                <label for="">Departement</label>
                <!--<input type="text" name="departement" class="form-control" 
                        value="" placeholder="Enter your fisrtname"> -->
                <select name="departement" class="form-control">
                    <option name="sedhiou" value="sedhiou">Sedhiou</option>
                    <option name="goudomp" value="goudomp">Goudomp</option>
                    <option name="bounkiling" value="bounkiling">Bounkiling</option>
                </select>
            </div>
            
            <!-- region -->
            <div class="form-group">
                <label for="">Region</label>
                <!--<input type="text" name="region" class="form-control" 
                        value="" placeholder="Enter your fisrtname"> -->
                <select name="region" class="form-control">
                    <option name="dakar" value="dakar">Dakar</option>
                    <option name="diourbel" value="diourbel">Diourbel</option>
                    <option name="fatick" value="fatick">Fatick</option>
                    <option name="kafrine" value="kafrine">Kafrine</option>
                    <option name="kaolack" value="kaolack">Kaolack</option>
                    <option name="kedougou" value="kedougou">Kedougou</option>
                    <option name="kolda" value="kolda">Kolda</option>
                    <option name="louga" value="louga">Louga</option>
                    <option name="matam" value="matam">Matam</option>
                    <option name="saintlouis" value="saintlouis">Saint-Louis</option>
                    <option name="sedhiou" value="sedhiou">Sedhiou</option>
                    <option name="tambacounda" value="tambacounda">Tambacounda</option>
                    <option name="thies" value="thies">Thies</option>
                    <option name="ziguinchor" value="ziguinchor">Ziguinchor</option>
                    <option name="autre" value="autre">Autre</option>
                </select>
            </div>

            
            <!-- cin -->
            <div class="form-group">
                <label for="">CIN</label>
                <input type="text" name="numcin" class="form-control" 
                        placeholder="Enter your cin" pattern="[0-9]{13}" maxlength="13" required >
            </div>

            
            <!-- num tel -->
            <div class="form-group">
                <label for="">Telephone</label>
                <input type="text" name="numtel" class="form-control" 
                        placeholder="Enter your phone number" pattern="[0-9]{12}"
                        maxlength="12" >
            </div>

            <div class="btn-group form-group" role="group" aria-label="Basic example">
                <button type="submit" name="save" class="btn btn-primary" 
                        <?php echo $issaveDisabled?'disabled':''; ?>>Enregistrer</button>&nbsp;
            </div>
        </form>
    </div>

    <div class="container-fluid"></div>

    <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>srpechessedhiou</span></strong>. Tous droits réservés !
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/"><strong>myeva.co </strong> <small> Etudes digitales</small></a>
      </div>
    </div>
  </footer><!-- End #footer -->

    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="bootstrap-auto-dismiss-alert.js"></script>
    <script src="js/form-validation.js">
        $(function() {
            $("#fpecheur").validate({

            }); 
        });

        $(function(){
           $("#fpecheur").validate({
               rules: {
                   nom: 'required',
                   prrenom: 'required',
                   raisonsocial: 'required'
               }
           });
        });
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS 
    -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
     integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
     crossorigin="anonymous"></script>
    
    </body>
</html>