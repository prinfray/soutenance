<?php 
session_start();
require_once('connect.php');

if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "") {
  echo '<h1>Bienvenue '.$_SESSION['sess_nom'].'</h1>';
  echo '<h4><a href="close.php">deconnexion</a></h4>';
} else { 
  header('location:acceuil.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<table>
    <thead>
        <th href='create.php'>Saisir une note</th>
        <th href='etudiants.php'>Etudiants</th>
        <th href='matiere.php'>Matieres</th>
        
    </thead>
    <tbody>
</body>
</html>