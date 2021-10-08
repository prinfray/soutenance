
<?php
session_start();
require_once('connect.php');


$req_cours = 'SELECT * FROM matiere ';
$query = $db->prepare($req_cours);
$query->execute();
$resultM = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($resultM as $matiere) 
{
?>
<a href='matiere.php?id=<?= $matiere['id']?>'><?= $matiere['nom']." ( ".$matiere['catégorie']." ) " ?></a>
<?php  } ?>
<a href="acceuil.php">acceuil </a>