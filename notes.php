<?php

session_start();
require_once('actions/connect.php');

$id = $_SESSION['sess_user_id'];
$req_matieres = 'SELECT nom FROM matieres WHERE prof_id VALUES $id';
$result = $db->query($req_matieres);
$req_eleves = 'SELECT * FROM eleves';
$eleves = $db->query($req_eleves);
print_r($eleves) ;
var_dump($matieres);




?>

<h1>Saisie de notes </h1>

<?php  foreach ($matieres as $matiere);{ 
 ?>
Matiere   <select id='matiere_select'>
   


  