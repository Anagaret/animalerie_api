<?php 
	require_once('annonce.php');
	if(isset(($_POST['nom']))){
		createAnnounce(
			$_POST['nom'],
			$_POST['race'],
			(int) $_POST['age'],
			(double)$_POST['poids'],
			(double)$_POST['taille'],
			$_POST['couleur']
		);
		
		header('Location: listAnnounce.php?userId='.$_POST['creatorId']);
	}
 ?>


		<a href='listAnnounce.php?userId=<?php echo $_GET['userId'];?>'>Accueil</a>
		<h1>Créer une annonce</h1>

		<form method='POST' action='createAnnonce.php'>
			nom : <input type='text' name='nom'/>
			race : <input type='text' name='race'/>
			age : <input type='int' name='age'/>
			poids :<input type='double' name='poids'/>
			taille :<input type='double' name='taille'/>
			couleur :<input type='text' name='couleur'/>
			<input type = 'submit' value = 'Créer une annonce'>
		</form>
