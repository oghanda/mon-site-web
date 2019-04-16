<?php
  session_start();
  include('bd/connexionDB.php'); 

  // S'il n'y a pas de session alors on ne va pas sur cette pageif (!isset($_SESSION['id']))
  {
    header('Location: index.php'); 
    exit;
  }
  
  // On récupère les informations de l'utilisateur connecté
  $afficher_profil = $DB->query("SELECT * 
    FROM utilisateurs 
    WHERE id = ?",
    array($_SESSION['id']));

  $afficher_profil = $afficher_profil->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mon profil</title>
  </head>
  <body>
    <!-- Ici on peut afficher toutes les informations que vous souhaitez : 
      - âge, 
      - sexe,
      - date d'anniversaire,
      - mail,
      - etc.
    -->
    <h2>Voici le profil de <?= $afficher_profil['nom'] . " " .  $afficher_profil['prenom']; ?></h2>
    <div>Quelques informations sur vous : </div>
    <ul>
      <li>Votre id est : <?= $afficher_profil['id'] ?></li>
      <li>Votre mail est : <?= $afficher_profil['mail'] ?></li>
      <li>Votre compte a été crée le : <?= $afficher_profil['date_creation_compte'] ?></li>
    </ul>
  </body>
</html>