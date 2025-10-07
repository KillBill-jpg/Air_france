<h2> ... ou simplement ... </h2>

<br>

<?php

	if (isset($_GET['action']) && isset($_GET['idvoyageur']))
	{
		$action = $_GET['action']; 
		$idvoyageur = $_GET['idvoyageur'];
		if ($action == "sup"){
			deleteVoyageur ($idvoyageur);
		}
	}

	if (isset($_GET['action']) && $_GET['action'] == "edit" && isset($_GET['idvoyageur'])) {
		echo "ID du voyageur reçu : " . $_GET['idvoyageur'];
	}
	
	if (isset($_GET['action']) && $_GET['action'] == "edit" && isset($_GET['idvoyageur'])) {
		$idvoyageur = $_GET['idvoyageur'];
		
		// Récupération des données actuelles du voyageur
		$uneConnexion = connexion();
		$requete = $uneConnexion->prepare("SELECT * FROM voyageur WHERE idvoyageur = ?");
		$requete->bind_param("i", $idvoyageur);
		$requete->execute();
		$result = $requete->get_result();
		$voyageur = $result->fetch_assoc();
		$requete->close();
		deconnexion($uneConnexion);
	
		if ($voyageur) {
			?>
			<h3>Modifier le voyageur</h3>
			<form method="post" action="">
				<input type="hidden" name="idvoyageur" value="<?= htmlspecialchars($voyageur['idvoyageur']) ?>">
				<label>Nom :</label>
				<input type="text" name="nomv" value="<?= htmlspecialchars($voyageur['nomv']) ?>" required>
				<br>
				<label>Prénom :</label>
				<input type="text" name="prenomv" value="<?= htmlspecialchars($voyageur['prenomv']) ?>" required>
				<br>
				<label>Email :</label>
				<input type="text" name="email" value="<?= htmlspecialchars($voyageur['email']) ?>" required>
				<br>
				<label>Téléphone :</label>
				<input type="text" name="telephone" value="<?= htmlspecialchars($voyageur['telephone']) ?>" required>
				<br>
				<input type="submit" name="modifier" value="Modifier">
			</form>
			<?php
		}
	
    
        editVoyageur($idvoyageur, $tab);
        
        header("Location: voyageur.php?page=5");
        exit();
    }

	require_once ("vue/vue_insert_voyageur.php");

	if(isset($_POST['Valider'])){
		insertVoyageur ($_POST); 

		echo "<br> Insertion réussie du voyageur <br>";
	}
	

	$lesVoyageurs = selectAllVoyageurs (); 

	require_once ("vue/vue_select_voyageur.php");
?>