$req_cours = 'SELECT id_matiere FROM prof_matiere WHERE id_prof="'.$idprof.'"';
$query = $db->prepare($req_cours);
$query->execute();
$resultM = $query->fetchAll(PDO::FETCH_ASSOC);
