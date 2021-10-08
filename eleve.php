<?php

session_start();
require_once('connect.php');

$req = 'SELECT * FROM eleves WHERE id= :id';
$query = $db->prepare($req);
$query->execute(
    array(
        'id'=>$_GET['id'],
    )
);
$result = $query->fetch();
$nom = $result['nom'];
$prenom = $result['prenom'];
$eleve = $nom." ".$prenom;


    
?>

<h2><?= $nom?></h2>
<h2><?= $prenom?></h2>



<?php 


$req = 'SELECT * FROM note WHERE eleve= :eleve';
$query = $db->prepare($req);
$query->execute(
    array(
        'eleve'=>$eleve,
    )
);
$resultM = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<table>
<th><tr>Matiere</tr> 
<th><tr>Professeur</tr></th>
<th><tr>Eleve</tr>
<th><tr>note</tr>

<?php
foreach ($resultM as $note)
{
    $idP = $note['prof_id'];
    $reqP = 'SELECT nom,prenom FROM profs WHERE id=:idp';
    $query = $db->prepare($reqP);
    $query->execute(
        array(
            'idp'=>$idP = $note['prof_id'],
        )
    );
    $resultP = $query->fetch();
    ?>
    <tr data-id-note='<?= $note['id']?>'>
        <?php
            echo "<td>".$note['id']."</td>";
            echo "<td>".$note['matiere']."</td>";
            echo "<td>".$resultP['nom'].$resultP['prenom']."</td>";
        ?>
        <td><input type="text" id="note-<?= $note['id']?>" name="note-<?= $note['id']?>" disabled value="<?= $note['note']?>"></td>
        <td><span class="modify-btn" data-note-modify="<?= $note['id']?>" onclick="">Modifier</span></td>
        <td><a href="delete.php?id=<?= $note['id']?>">Supprimer</a></td>
        
    </tr>


<?php 
 }  
?>
 <br> </br>
 <a href="acceuil.php">acceuil </a>

<script src="/JS/update_value.js"></script>