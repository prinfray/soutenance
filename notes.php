<?php

session_start();
require_once('connect.php');
// on recupere les matieres et les eleves 
$idprof = $_SESSION['sess_user_id'];
$req_cours = 'SELECT id_matiere FROM prof_matiere WHERE id_prof="'.$idprof.'"';
$query = $db->prepare($req_cours);
$query->execute();
$resultM = $query->fetchAll(PDO::FETCH_ASSOC);

$req_eleves = 'SELECT * FROM eleves  ';
$query = $db->prepare($req_eleves);
$query->execute();
$resultE = $query->fetchAll(PDO::FETCH_ASSOC);

//  Ajout de note 

if(isset($_POST['note']) && $_POST['note'] != " " && isset($_POST['matiere']) && $_POST['matiere'] != " " && isset($_POST['eleve']) && $_POST['eleve'] != " ") {
    
    
    $note = ($_POST['note']);
    $matiere = ($_POST['matiere']);
    $eleve =($_POST['eleve']);


            $sql = "INSERT INTO note (note, matiere, eleve,prof_id) VALUES (:note, :matiere, :eleve, :prof);";
            $query = $db->prepare($sql);


            $query->bindValue(":note", $note, PDO::PARAM_STR);
            $query->bindValue(":matiere", $matiere, PDO::PARAM_STR);
            $query->bindValue(":eleve", $eleve, PDO::PARAM_STR);
            $query->bindValue(":prof", $idprof, PDO::PARAM_INT); 
    
            $query->execute();  
            $_SESSION['message'] = "note ajouté avec succès !";
            
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
    

<h1>Saisie de notes </h1>
<form method="post" action="/notes.php"> 
<select  id="note" name="note">
    <option selected> </option>
    <option value="A">A</option>
    <option value="B">B</option>
    <option value="C">C</option>
    <option value="D">D</option>
    
</select>
<select id='matiere' name="matiere">
<option selected> </option>
<?php  foreach ($resultM as $matiere_id) 
    {
        $idM = $matiere_id ['id_matiere'];
        $req_matieres = 'SELECT * FROM matiere WHERE id="'.$idM.'"';
        $query = $db->prepare($req_matieres);
        $query->execute();
        $resultM = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultM as $matieres) 
        {

?>

<option value="<?= $matieres['nom'] ?>"><?= $matieres['nom'] ?></option>

<?php  }}  ?>
</select> 

<select id='eleve' name="eleve">
<option selected> </option>
<?php  foreach ($resultE as $eleves) 
    {
?>
<option name="<?= $eleves['nom']." ".$eleves['prenom'] ?>"><?= $eleves['nom']." ".$eleves['prenom'] ?></option>

<?php  }  ?>
</select>
<input type="submit" id="bouton_add" value="ajouter" name="bouton_add" />

</form>

<a href="acceuil.php">acceuil </a>
</body>
</html>
