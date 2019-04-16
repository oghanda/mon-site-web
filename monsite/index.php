<?php
  // Permet de savoir s'il y a une session. 
  // C'est à dire si un utilisateur c'est connecté à votre site 
  session_start(); 
  
  // Fichier PHP contenant la connexion à votre BDD
  include('bd/connexionDB.php'); 
?>
<!DOCTYPE html>
<html>
  ﻿<head>
    ﻿<meta charset="utf-8"/>
    ﻿<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Accueil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>
  ﻿<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Accueil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
                if(!isset($_SESSION['id'])){
                    // ... 
                }else{
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="profil.php">Mon profil</a>
                    </li>
                <?php
                } 
            ?>
        </ul>
        <ul class="navbar-nav ml-md-auto">
            <?php
                if(!isset($_SESSION['id'])){
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="inscription.php">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="connexion.php">Connexion</a>
                    </li>
                <?php
                }else{
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="deconnexion.php">Déconnexion</a>
                    </li>
                <?php
                } 
            ?>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">   
        <div class="col-0 col-sm-0 col-md-2 col-lg-3"></div>
        <div class="col-12 col-sm-12 col-md-8 col-lg-6">
            <h1>Mon site à moi</h1>
            <div>
                <?php
                    if(!isset($_SESSION['id'])){
                    ?>
                        <a href="motdepasse.php">Mot de passe oublié</a>
                    <?php
                    }
                ?>
            </div>
            <div>
                <?php
                    if(isset($_SESSION['id'])){
                        echo 'ID : ' . $_SESSION['id'] . ', Nom : ' . $_SESSION['nom'] . ", prénom : " . 
                            $_SESSION['prenom'] . ", mail : " . $_SESSION['mail'];
                    } 
                ?>
            </div>
        </div>
    </div>
</div>
    ﻿<h1>Créche Parental</h1>
    <?php
      if(!isset($_SESSION['id'])){ // Si on ne détecte pas de session alors on verra les liens ci-dessous
      ?>
        <a href="inscription.php">Inscription</a> <!-- Liens de nos futures pages -->
        ﻿<a href="connexion.php">Connexion</a>
        <a href="motdepasse.php">Mot de passe oublié</a>
      <?php
      }else{ // Sinon s'il y a une session alors on verra les liens ci-dessous
      ﻿?>
        ﻿<a href="profil.php">Mon profil</a>
        <a href="deconnexion.php">Déconnexion</a>
      ﻿<?php
      } 
    ?>
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
﻿</html>