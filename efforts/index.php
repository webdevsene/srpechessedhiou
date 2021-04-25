<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    -->
    
    <link rel="stylesheet" 
    href="https://bootswatch.com/4/litera/bootstrap.min.css">
    

    <!-- Version développement. Celle-ci donne des avertissements utiles sur la console -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <title>Les statistiques </title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
      <a class="navbar-brand" href="../index.php">S.R pêche-sedhiou</a>
    
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Caractéristiques</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" 
            aria-haspopup="true" aria-expanded="false">Menu déroulant</a>
            <ul class="dropdown-menu">
              <li><a href="#">action</a></li>
              <li><a href="#">Une autre action</a></li>
              <li><a href="#">Quelque chose d'autre ici</a></li>
              <li class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Lien séparé</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container mt-5" id="app-2">
        <span v-bind:title="message">
          Passez votre souris sur moi pendant quelques secondes
          pour voir mon titre lié dynamiquement !
        </span>
    </div>

    <script>
        var app2 = new Vue({
            el: '#app-2',
            data: {
              message: 'Vous avez affiché cette page le ' + new Date().toLocaleString()
            }
        })
    </script>
</body>
</html>