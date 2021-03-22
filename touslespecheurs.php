<!DOCTYPE html>
<html>
    <head>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      rel="stylesheet"
    />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    
    <!-- important pour inclure le plugin jqueryUi -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
        <?php require_once 'mn.php'; ?>
        <div class="page-header">
          <h2 style="text-align: center; margin-left: -50rem;">Les derniers pêcheurs enrollés !</h2>
        </div>       
          
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

    <div class="container d-flex justify-content-right" style="position: relative; width: 100rem;">

             <!-- cin -->
            <div class="col-md-3"></div> 
            <div class="col-md-6" style="margin-top:20px; margin-bottom:20px;">
                <form method="POST">
                  <div class="form-group">
                    <div id="numcinlist" class="text-light text-info"></div>
                    <label for=""> 
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">
                          <i class="fa fa-fw fa-search"></i> Rechercher un pêcheur par CIN
                        </button>
                                                                      
                    </label>
                    <input type="text" class="form-control" name="numcin" id="numcin" placeholder="Search by Cin">               
                     
                    <div class="clearfix"></div>
                  </div>
                </form>
            </div>

            

      <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>    <!-- recuperer la liste des pecheurs avec une boocle while  -->
        <div class="card col-md-3" style="width: 32rem; display: inline-block; font-size: large;">
          
          <!--<img class="card-img-top" src="https://via.placeholder.com/290x150" alt="Card image cap"> -->
          <div class="card-body">            
              <ul class="list-group list-group-flush" id="elt">
                <li class="list-group-item"><span class="fa"><i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo $row['nom']. " " . $row['prenom'] ?></span></li>
                <li class="list-group-item"><span class="fa"><i class="fas fa-"></i><?php  echo $row['num_cin'] . " "?></span></li>
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

        <div class="container-fluid"></div>       
    </div>
      
      <!--- delete statement will be here -->
      

    <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>srpechessedhiou</span></strong>. Tous droits réservés !
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/"><strong>myeva-baromet </strong> <small> Etudes digitales</small></a>
      </div>
    </div>
  </footer><!-- End #footer -->

  <!-- modal pour   afficher les resultats de recherche --> 
  <!-- Button trigger modal -->
  
  
  <!-- Modal -->
  
  <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Infos details</h4>  
                </div>  
                <div class="modal-body" id="pecheur_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>  
                </div>  
           </div>  
      </div>  
 </div>  


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
        <!-- Latest compiled and minified Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script>
          // confirm record deletion
          function delete_pecheur(id) {
            var answer = confirm('Etes vous sûr de vouloir supprimer cet élément ? Attention cette Oppération est irreversible.');
            if (answer) {
              // if user clicked ok
              // pass the id to process.php and execute the delete query
              Window.location = 'process.php?id' + id;
            }
          }
        </script>

        <script type="text/javascript">
          // <!--- Autocomplete textbox jquery ajax --->
  $(document).ready(function(){
      $("#numcin").on("keyup", function(){
        var numcin = $(this).val();
        if (numcin !== "") {
          $.ajax({
            url:"auto_search.php",
            type:"POST",
            cache:false,
            data:{numcin:numcin},
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
        $('#numcin').val($(this).text());
        $('#numcinlist').fadeOut("fast");
      });

      $(document).on('click', '#submit', function () { 
        var pdata = $(this).attr('id');
        if (pdata != '') {
          $.ajax({
            url: 'searchengine.php',
            method: 'POST',
            cache: false,
            data: {pdata: pdata},
            success: function(data){
              $('#pecheur_detail').html(data);  
              $('#dataModal').modal("show");
            }
          });
        }
       });
  });
        </script>

    </body>
</html>
