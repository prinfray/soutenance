<?php
require_once('connect.php');

  
if(!empty($_GET['id']) && !empty($_GET['note_to_update'])){

    $id = $_GET['id'];
    $note = strip_tags($_GET['note_to_update']);

    $sql = "UPDATE note SET note= :note WHERE id= :id";
    $query = $db->prepare($sql);
    // $query->bindValue(':id', $id, PDO::PARAM_INT);
    // $query->bindValue(':note', $note, PDO::PARAM_INT);
    $query->execute(
        array(
            'id' => $id ,
            'note' => $note
        )
    );
?>
 <script>window.history.go(-1);</script> 
<?php
}?>