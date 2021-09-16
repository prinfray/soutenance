<?php 

try {

    $db=new PDO('mysql:host=localhost;dbname=crud','root','');


}catch (PDOException $e){

    echo 'Erreur:' .$e ->getMessage();
    die();
}

