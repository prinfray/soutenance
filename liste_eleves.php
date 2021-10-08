<?php
session_start();
require_once('connect.php');

$req_eleves = 'SELECT * FROM eleves ';
$queryE = $db->prepare($req_eleves);
$queryE->execute();
$resultE = $queryE->fetchAll(PDO::FETCH_ASSOC);





  foreach ($resultE as $eleves) 
    {
?>
 <a href='eleve.php?id=<?= $eleves['id']?>'><?= $eleves['nom']." ".$eleves['prenom'] ?></a>
<?php  } ?>

<a href="acceuil.php">acceuil </a>


