
<?php
session_start();
require_once('actions/connect.php');


$req_cours = 'SELECT * FROM matiere ';
$query = $db->prepare($req_cours);
$query->execute();
$resultM = $query->fetchAll(PDO::FETCH_ASSOC);



foreach ($resultM as $matiere) 
{
?>
<a href='matiere.php'><?= $matiere['nom']." ".$matiere['catégorie'] ?></a>
<?php  } ?>