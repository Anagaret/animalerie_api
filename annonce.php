<?php 
	require_once('connection.php'); 

	function getUser(String $login, String $password){
		$connection = connect();
		$query = $connection->prepare('SELECT id FROM user WHERE password= :password AND login = :login');
		$query->execute(array('password' => $password, 'login'=> $login));
		return  $query->fetch();

		
	}

	function createAnnounce(
		string $nom,
		string $race,
		int $age,
		double $poids,
		double $taille,
		string $couleur,
		boolean $is_adopted = null,
		string $adoption_date = false,
		string $image
		){
			if(isset($nom) && isset($race) && isset($age) && isset($poids) && isset($taille) && isset($couleur) && isset($image)){
				$connection = new PDO(
				'mysql:host=localhost;dbname=animalerie',
				'root',
				'',
				[
					PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION
				]);
				

				$query = $connection->prepare('INSERT INTO animaux(nom, race, age, poids, taille, couleur, is_adopted,adoption_date, image) VALUES (:nom, :race, :age, :poids, :taille, :couleur, :is_adopted, :adoption_date, :image)');

				$query->execute(array(
					'nom' => $nom,
					'race' => $race,
					'age' => $age,
					'poids' => $poids,
					'taille' => $taille,
					'couleur' => $couleur,
					'is_adopted' => $is_adopted,
					'adoption_date' => $adoption_date,
					'image' => $image));

				$query->closeCursor();
			}
	}

	function getAllAnnounces(){
		$connection = new PDO(
				'mysql:host=localhost;dbname=animalerie',
				'root',
				'',
				[
					PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION
				]);
		$query = $connection->prepare('SELECT * FROM animaux');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}


	function getAnnounce(int $unique_id){
		$connection = new PDO(
				'mysql:host=localhost;dbname=animalerie',
				'root',
				'',
				[
					PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION
				]);
		$query = $connection->prepare('SELECT * FROM animaux WHERE unique_id = :unique_id');
		$query->execute(array('unique_id' => $unique_id));
		return $query->fetch();
	}