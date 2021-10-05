<?php
require_once('actions/connect.php');

if(isset($_POST)){ 



            $sql = "INSERT INTO `liste` (`note`, `matiere`, `eleve_id`,'prof_id') VALUES (:note, :matiere, :eleve);";

            $query = $db->prepare($sql);

            $query->bindValue(':note', $note, PDO::PARAM_STR);
            $query->bindValue(':matiere', $matiere, PDO::PARAM_STR);
            $query->bindValue(':eleve', $eleve, PDO::PARAM_INT);

            $query->execute();
            $_SESSION['message'] = "note ajouté avec succès !";
            header('Location: index.php');
        }


require_once('close.php');