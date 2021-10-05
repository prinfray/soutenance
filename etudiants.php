<?php
session_start();
require_once('actions/connect.php');

$req_eleves = 'SELECT * FROM eleves ';
$queryE = $db->prepare($req_eleves);
$queryE->execute();
$resultE = $queryE->fetchAll(PDO::FETCH_ASSOC);

$idprof = $_SESSION['sess_user_id'];
$reqN = 'SELECT * FROM "notes" WHERE id="'.$idprof.'"';
$queryE = $db->prepare($reqN);
$queryE->execute();
$resultN = $queryE->fetchAll(PDO::FETCH_ASSOC);


  foreach ($resultE as $eleves) 
    {
?>
<h3><?= $eleves['nom']." ".$eleves['prenom'] ?></h3>

<?php foreach ($resultN as $note)
{
    ?> 
    <h3><?= $note['matiere']." ".$note['nom']." ".$note['note'] ?> </h3>

<?php  }} ?>

