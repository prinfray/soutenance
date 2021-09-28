<?php

session_start();
require_once('actions/connect.php');

$id = $_SESSION['sess_user_id'];
$req_matieres = 'SELECT nom FROM matieres WHERE prof_id VALUES $id';
$matieres = $db->query($req_matieres);
$req_eleves = 'SELECT * FROM eleves';
$eleves = $db->query($req_eleves);
print_r($eleves) ;
var_dump($matieres);




?>

<h1>Saisie de notes </h1>

Matiere   <select id='matiere_select'>
    <?php  foreach ($matieres as $matiere);{  ?>
                    <option value="<?php $matiere?>"></option>
                    <?php    }  ?>


                    
    <!-- Etudiant   <select id='matiere_select'>
                    <option value="<?php echo $eleve ?>"></option>
                    <option value="Anglais"></option>
                    <option value="Francais"></option>
                    <option value="Anglais"></option></select>

    
    note
    <select  id='matiere_select'>
                    <option value="A"> A</option>
                    <option value="B"> B </option>
                    <option value="C"> C </option>
                    <option value="D"> D </option></select> -->
     


  