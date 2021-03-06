<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi user role login system !</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 bg-light mt-5 px-0">
                <h3 class="text-center text-light bg-danger p-3">
                    Multi User Role Login System
                </h3>
                <form action="" method="" class="p-4">

                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-lg" 
                        placeholder="Username" required aria-describedby="helpId">
                      <small id="helpId" class="text-muted">Le nom utilisateur est obligatoire</small>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-lg" 
                            placeholder="Password" required>
                    </div>
                    <div class="form-group lead">
                      <label for="userType">Je suis :</label>
                      <input type="radio" name="userType" class="custom-radio" 
                            required value="student">&nbsp;Student |
                      <input type="radio" name="userType" class="custom-radio" 
                            required value="teacher">&nbsp;Teacher |
                      <input type="radio" name="userType" class="custom-radio" 
                            required value="admin">&nbsp;Admin
                    </div>
                    <div class="form-group">
                      <input type="submit" name="login" class="btn btn-danger btn-block" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
  

        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>