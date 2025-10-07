<h2> ... ou aimeriez-vous savoir ... </h2>

<br>

<?php

	if (isset($_GET['action']) && isset($_GET['idavion']))
	{
		$action = $_GET['action']; 
		$idavion = $_GET['idavion'];
		if ($action == "sup"){
			deleteAvion ($idavion);
		}
	}

	if (isset($_GET['action']) && $_GET['action'] == "edit" && isset($_GET['idavion'])) {
		echo "ID de l'avion reçu : " . $_GET['idavion'];
	}
	
	if (isset($_GET['action']) && $_GET['action'] == "edit" && isset($_GET['idavion'])) {
		$idavion = $_GET['idavion'];
		
		// Récupération des données actuelles de l'avion
		$uneConnexion = connexion();
		$requete = $uneConnexion->prepare("SELECT * FROM avion WHERE idavion = ?");
		$requete->bind_param("i", $idavion);
		$requete->execute();
		$result = $requete->get_result();
		$avion = $result->fetch_assoc();
		$requete->close();
		deconnexion($uneConnexion);
	
		if ($avion) {
			?>
			<h3>Modifier l'avion</h3>
			<form method="post" action="">
				<input type="hidden" name="idavion" value="<?= htmlspecialchars($avion['idavion']) ?>">
				<label>Modèle :</label>
				<input type="text" name="modele" value="<?= htmlspecialchars($avion['modele']) ?>" required>
				<br>
				<label>Capacité :</label>
				<input type="number" name="capacite" value="<?= htmlspecialchars($avion['capacite']) ?>" required>
				<br>
				<label>Année de fabrication :</label>
				<input type="number" name="fabrication" value="<?= htmlspecialchars($avion['fabrication']) ?>" required>
				<br>
				<input type="submit" name="modifier" value="Modifier">
			</form>
			<?php
		}
	
    
        editAvion($idavion, $tab);
        
        header("Location: avion.php?page=3");
        exit();
    }

	require_once ("vue/vue_insert_avion.php");

	if(isset($_POST['Valider'])){
		insertAvion ($_POST); 

		echo "<br> Insertion réussie de l'avion <br>";
	}
	

	$lesAvions = selectAllAvions (); 

	require_once ("vue/vue_select_avion.php");
?>