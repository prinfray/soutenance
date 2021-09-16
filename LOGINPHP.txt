
<?php

require_once('connect.php');

$msg = ""; 

if(isset($_POST['bouton_log'])) {
  $email = trim($_POST['email']);
  $mdp = trim($_POST['mdp']);
  if($email != "" && $mdp != "") {
    try {
      $log = "SELECT * from professeur WHERE email=:email AND mdp=:mdp";
      $stmt = $db->prepare($log);
      $stmt->bindParam('email', $email, PDO::PARAM_STR);
      $stmt->bindValue('mdp', $mdp, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count =!empty($row)) {
        $_SESSION['sess_user_id']   = $row['id'];
        $_SESSION['sess_mail'] = $row['email'];
        $_SESSION['sess_nom'] = $row['nom'];
       
      } else {
        $msg = "Invalid email$email and mdp!";
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } else {
    $msg = "Les deux champs sont requis !";
  }
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
<form method="post">
  <table class="loginTable">
     <tr>
      <th>Autentification</th>
     </tr>
     <tr>
      <td>
        email:
        <input type="text" name="email" id="email" value="" autocomplete="off" />
      </td>
     </tr>
     <tr>
      <td><label>mdp:</label>
        <input type="mdp" name="mdp" id="mdp" value="" autocomplete="off" /></td>
     </tr>
     <tr>
      <td>
         <input type="submit" name="bouton_log" id="bouton_log" value="connexion" />
         <span class="message_conn"><?php echo $msg;?></span>
      </td>
     </tr>
  </table>
</form>
</body>
</html>

<?php
