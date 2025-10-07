<h2> Aimeriez-vous savoir ... </h2>

<br>

<?php

	if (isset($_GET['action']) && isset($_GET['idpilote']))
	{
		$action = $_GET['action']; 
		$idpilote = $_GET['idpilote'];
		if ($action == "sup"){
			deletePilote ($idpilote);
		}
	}

	if (isset($_GET['action']) && $_GET['action'] == "edit" && isset($_GET['idpilote'])) {
		echo "ID du pilote reçu : " . $_GET['idpilote'];
	}
	
	if (isset($_GET['action']) && $_GET['action'] == "edit" && isset($_GET['idpilote'])) {
		$idpilote = $_GET['idpilote'];
		
		// Récupération des données actuelles du pilote
		$uneConnexion = connexion();
		$requete = $uneConnexion->prepare("SELECT * FROM pilote WHERE idpilote = ?");
		$requete->bind_param("i", $idpilote);
		$requete->execute();
		$result = $requete->get_result();
		$pilote = $result->fetch_assoc();
		$requete->close();
		deconnexion($uneConnexion);
	
		if ($pilote) {
			?>
			<h3>Modifier le pilote</h3>
			<form method="post" action="">
				<input type="hidden" name="idpilote" value="<?= htmlspecialchars($pilote['idpilote']) ?>">
				<label>Nom :</label>
				<input type="text" name="nom" value="<?= htmlspecialchars($pilote['nom']) ?>" required>
				<br>
				<label>Prenom :</label>
				<input type="text" name="prenom" value="<?= htmlspecialchars($pilote['prenom']) ?>" required>
				<br>
				<label>Licence :</label>
				<input type="text" name="licence" value="<?= htmlspecialchars($pilote['licence']) ?>" required>
				<br>
				<input type="submit" name="modifier" value="Modifier">
			</form>
			<?php
		}
	
    
        editPilote($idpilote, $tab);
        
        header("Location: index.php?page=2");
        exit();
    }

	require_once ("vue/vue_insert_pilote.php");

	if(isset($_POST['Valider'])){
		insertPilote ($_POST); 

		echo "<br> Insertion réussie du pilote <br>";
	}
	

	$lesPilotes = selectAllPilotes (); 

	require_once ("vue/vue_select_pilote.php");
?>