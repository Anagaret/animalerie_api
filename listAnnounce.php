<?php 
	require_once('annonce.php');

	$announces = getAllAnnounces();
?>

<a href='createAnnonce.php?userId=<?php echo $_GET['userId'];?>'>Créer une annonce</a>
<h1>Liste des Annonces</h1>

<?php 
foreach ($announces as $announce) {
	echo '<a href= \'announceDetails.php?announceId='.$announce['id'].'&userId='.$_GET['userId'].'\'>'.$announce['titre'].'</a><br>';
}
?>