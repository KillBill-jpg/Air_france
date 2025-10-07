<h2> À moins que vous ne vouliez juste ... </h2>

<br>

<?php

	if (isset($_GET['action']) && isset($_GET['idbillet']))
	{
		$action = $_GET['action']; 
		$idbillet = $_GET['idbillet'];
		if ($action == "sup"){
			deleteBillet ($idbillet);
		}
	}

	if (isset($_GET['action']) && $_GET['action'] == "edit" && isset($_GET['idbillet'])) {
		echo "ID du billet reçu : " . $_GET['idbillet'];
	}
	
	if (isset($_GET['action']) && $_GET['action'] == "edit" && isset($_GET['idbillet'])) {
		$idbillet = $_GET['idbillet'];
		
		// Récupération des données actuelles du billet
		$uneConnexion = connexion();
		$requete = $uneConnexion->prepare("SELECT * FROM billet WHERE idbillet = ?");
		$requete->bind_param("i", $idbillet);
		$requete->execute();
		$result = $requete->get_result();
		$billet = $result->fetch_assoc();
		$requete->close();
		deconnexion($uneConnexion);
	
		if ($billet) {
			?>
			<h3>Modifier le billet</h3>
			<form method="post" action="">
				<input type="hidden" name="idbillet" value="<?= htmlspecialchars($billet['idbillet']) ?>">
				<label>Numéro de la place :</label>
				<input type="text" name="nump" value="<?= htmlspecialchars($billet['nump']) ?>" required>
				<br>
				<label>Classe :</label>
				<input type="text" name="classe" value="<?= htmlspecialchars($billet['adresse']) ?>" required>
				<br>
				<label>Prix :</label>
				<input type="number" name="prix" value="<?= htmlspecialchars($billet['prix']) ?>" required>
				<br>
				<input type="submit" name="modifier" value="Modifier">
			</form>
			<?php
		}
	
    
        editBillet($idbillet, $tab);
        
        header("Location: billet.php?page=6");
        exit();
    }

    $lesVols = selectAllVols ();
    $lesVoyageurs = selectAllVoyageurs ();

	require_once ("vue/vue_insert_billet.php");

	if(isset($_POST['Valider'])){
		insertBillet ($_POST); 

		echo "<br> Insertion réussie du billet <br>";
	}
	

	$lesBillets = selectAllBillets (); 

	require_once ("vue/vue_select_billet.php");
?>