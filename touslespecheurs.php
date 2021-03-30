<!DOCTYPE html>
<html>
    <head>
    <!--
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      rel="stylesheet"
    />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    
    <!-- important pour inclure le plugin jqueryUi 
    -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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

         <!-- Modal dialog -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"         
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-info">Détails sur pêcheur !</h2>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
              <div class="modal-body">
                <div class="container-fluid">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              </div>
            </div>
          </div>
        </div> <!-- Modal dialog end-->

    <body>

        <?php require_once 'mn.php'; ?>
        <div class="page-header">
          <h2 style="text-align: center; margin-left: -50rem;">Les derniers pêcheurs enrollés !</h2>
        </div>  

         <?php 
         
            #require_once 'process.php'; 
            if (isset($_SESSION['message'])): ?>
              <div class="alert alert-<?=$_SESSION['msg_type']?>" class="form-group" role="alert" data-auto-dismiss="50">
                  <i class='fas fa-check'></i>
                  <?php 
                      echo $_SESSION['message'];
                      unset($_SESSION['message']);
                      ?>
            </div>
        <?php endif; ?>
          
    
    <?php          
        # $mysqli = new  mysqli('localhost', 'root', '', 'srpechessedhiou') or die($mysqli_error);
        # $result = $mysqli->query("SELECT * FROM `tbl_pecheur` ORDER BY id DESC LIMIT 10") or die($mysqli->error);

        #pre_r($result);
        #pre_r($result->fetch_assoc());
        #pre_r($result->fetch_assoc());

        // used to connect to the database
        $host = "localhost";
        $db_name = "srpechessedhiou";
        $username = "root";
        $password = "";

        try {
            $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);

            $query = "SELECT * FROM `tbl_pecheur` ORDER BY id DESC LIMIT 10";

            // preparer la requete 
            $result = $con->prepare($query);

            //faut executé la requete
            $result->execute();
        }

        // show error
        catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
    ?>

    <div class="container justify-content-right" style="position: relative; width: 100rem;">

             <!-- cin 
            <div class="col-md-3"></div> 
             -->
            <div class="" style="width: 35rem; margin-left:210px; margin-bottom:20px; margin-top: 20px;">
                
                  <div class="form-group">
                    <div id="numcinlist" class="text-light text-danger" style="font-size: large;"></div>
                    <label for="numcin_txb"> 
                        <button type="button" name="btn_submit" id="btn_submit" class="btn btn-info" data-toggle="modal" data-target="#modelId">
                          <i class="fa fa-fw fa-search"></i> Rechercher un pêcheur par CIN /NIN
                        </button>
                    </label>
                    <input type="text" class="form-control" name="numcin_txb" id="numcin_txb" placeholder="Search by Cin">               
                     
                  </div>   

                  <!-- 
                    comment en attendant d'essayer le modal dialog
                    <div id="result_div"></div> -->
            </div>

            

      <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>    <!-- recuperer la liste des pecheurs avec une boocle while  -->
        <div class="card col-md-3" style="width: 32rem; display: inline-block; font-size: large;">
          
          <!--<img class="card-img-top" src="https://via.placeholder.com/290x150" alt="Card image cap"> -->
          <div class="card-body">            
              <ul class="list-group list-group-flush" id="elt">
                <li class="list-group-item"><span class="fa"><i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo $row['nom']. " " . $row['prenom'] ?></span></li>
                <li class="list-group-item"><span class="fa"><i class="fas fa-credit-card"></i> <?php  echo $row['num_cin'] . " "?></span></li>
                <li class="list-group-item"><span class="fa"><i class="fas fa-map-marked-alt"></i></span>  <?php echo $row['adresse'] ; ?></li>
                <li class="list-group-item"><span class="fa"><i class="fa fa-phone" aria-hidden="true"></i></span>
                    <?php echo $row['num_tel'] ; ?></li>
                <li class="list-group-item"><span class="fa"><i class="fas fa-ship"></i></span> <?php echo $row['port_attache'] ; ?></li>
              </ul>
          </div>
          <div class="card-body">
            <a href="process.php?id=<?php echo $row['id'] ; ?>" class="btn btn-danger btn-sm remove">Supprimer</a> |
            <a href="touslespecheurs.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Mettre à jour</a>
          </div>
              <hr>
        </div>

        <?php endwhile ?>
    </div>

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

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) 
        -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
        <!-- Latest compiled and minified Bootstrap JavaScript 
        -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <script type="text/javascript">
          // <!--- Autocomplete textbox jquery ajax --->
          $(document).ready(function(){
              $("#numcin_txb").on("keyup", function(){
                var numcin = $(this).val();
                if (numcin !== "") {
                  $.ajax({
                    url:"auto_search.php",
                    type:"POST",
                    cache:false,
                    data:{numcin_txb:numcin},
                    success:function(data){
                      $("#numcinlist").html(data);
                      $("#numcinlist").fadeIn();
                    }  
                  });
                }else{
                  $("#numcinlist").html("");  
                  $("#numcinlist").fadeOut();
                }
              });
            
              // click one particular numcin  it's fill in textbox
              $(document).on("click","#nat", function(){
                $('#numcin_txb').val($(this).text());
                $('#numcinlist').fadeOut("fast");
              });
            
          });
        </script>

        <script>

          $(document).ready(function () {
            function search() {
              var numcin_txb = $('#numcin_txb').val();

              if (numcin_txb !== "") {
                $('#result_div').html("");

                $.ajax({
                  type: "post",
                  url: "searchengine.php",
                  data: "numcin_txb=" + numcin_txb,
                  success: function (data) {

                    // TODO ajouter data in Modal body en deux lignes
                    $('.container-fluid').html(data);

                    // comment en attendant d'essayer le modal dialog
                    // $('#result_div').html(data);
                    $("#numcin_txb").val("");
                  }
                });
              }
            } // function search

            $("#btn_submit").click(function (e) { 
              e.preventDefault();
              search(); 
              
            });

            $("#numcin_txb").keyup(function (e) { 
              if (e.keyCode == 13) {
                search();
                $('#modelId').html('show'); 
              }
            });
            
          });
        </script>

    </body>
</html>
