<?php
session_start();
require_once('actions/connect.php');

$req_eleves = 'SELECT * FROM eleves ';
$queryE = $db->prepare($req_eleves);
$queryE->execute();
$resultE = $queryE->fetchAll(PDO::FETCH_ASSOC);





  foreach ($resultE as $eleves) 
    {
?>
 <a href='etudiant.php'><?= $eleves['nom']." ".$eleves['prenom'] ?></a>
<?php  } ?>

