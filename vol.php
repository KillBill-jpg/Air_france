<h2> Peut-être est-ce ... </h2>

<br>

<?php

	if (isset($_GET['action']) && isset($_GET['idvol']))
	{
		$action = $_GET['action']; 
		$idvol = $_GET['idvol'];
		if ($action == "sup"){
			deleteVol ($idvol);
		}
	}

	if (isset($_GET['action']) && $_GET['action'] == "edit" && isset($_GET['idvol'])) {
		echo "ID du vol reçu : " . $_GET['idvol'];
	}
	
	if (isset($_GET['action']) && $_GET['action'] == "edit" && isset($_GET['idvol'])) {
		$idvol = $_GET['idvol'];
		
		// Récupération des données actuelles du vol
		$uneConnexion = connexion();
		$requete = $uneConnexion->prepare("SELECT * FROM vol WHERE idvol = ?");
		$requete->bind_param("i", $idvol);
		$requete->execute();
		$result = $requete->get_result();
		$vol = $result->fetch_assoc();
		$requete->close();
		deconnexion($uneConnexion);
	
		if ($vol) {
			?>
			<h3>Modifier le vol</h3>
			<form method="post" action="">
				<input type="hidden" name="idvol" value="<?= htmlspecialchars($vol['idvol']) ?>">
				<label>Date de départ :</label>
				<input type="datetime-local" name="dated" value="<?= htmlspecialchars($vol['dated']) ?>" required>
				<br>
				<label>Date d'arrivée :</label>
				<input type="datetime-local" name="datea" value="<?= htmlspecialchars($vol['datea']) ?>" required>
				<br>
				<label>Lieu de départ :</label>
				<input type="text" name="lieud" value="<?= htmlspecialchars($vol['lieud']) ?>" required>
				<br>
				<label>Lieu d'arrivée :</label>
				<input type="text" name="lieua" value="<?= htmlspecialchars($vol['lieua']) ?>" required>
				<br>
				<input type="submit" name="modifier" value="Modifier">
			</form>
			<?php
		}
    
        editVol($idvol, $tab);
        
        header("Location: vol.php?page=4");
        exit();
    }

    $lesPilotes = selectAllPilotes ();
    $lesAvions = selectAllAvions ();

	require_once ("vue/vue_insert_vol.php");

	if(isset($_POST['Valider'])){
		insertVol ($_POST); 

		echo "<br> Insertion réussie du vol <br>";
	}
	

	$lesVols = selectAllVols (); 

	require_once ("vue/vue_select_vol.php");
?>