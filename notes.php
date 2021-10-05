<?php

session_start();
require_once('actions/connect.php');

$idprof = $_SESSION['sess_user_id'];
$req_cours = 'SELECT id_matiere FROM prof_matiere WHERE id_prof="'.$idprof.'"';
$query = $db->prepare($req_cours);
$query->execute();
$resultM = $query->fetchAll(PDO::FETCH_ASSOC);



$req_eleves = 'SELECT id_eleve FROM eleve_matiere WHERE id_matiere ="'.$resultM.'"  ';
$query = $db->prepare($req_eleves);
$query->execute();
$resultE = $query->fetchAll(PDO::FETCH_ASSOC);
echo $resultE;

?>

<h1>Saisie de notes </h1>
<form method="post"> 
<select  id="note">
    <option>A</option>
    <option>B</option>
    <option>C</option>
    <option>D</option>
</select>
<select id='matiere'>
<?php  foreach ($resultC as $cours) 
    {
        $idM = $cours ['matiere_id'];
        $req_matieres = 'SELECT * FROM matiere WHERE id="'.$idM.'"';
        $query = $db->prepare($req_matieres);
        $query->execute();
        $resultM = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultM as $matieres) 
        {

?>

<option><?= $matieres['nom'] ?></option>

<?php  }}  ?>
</select> 

<select id='eleve'>
<?php  foreach ($resultE as $eleves) 
    {
?>
<option><?= $eleves['nom']." ".$eleves['prenom'] ?></option>

<?php  }  ?>
</select>

<button>Enregistrer</button>
</form>


