<?php

	function connexion (){
		$serveur = "localhost"; 
		$bdd = "AirFrance"; 
		$user = "root"; 
		$mdp = ""; 
		$uneConnexion = mysqli_connect($serveur, $user,$mdp,$bdd);
		if( $uneConnexion ){
			return $uneConnexion;
		}else {
			echo "<br> Erreur de connexion a la BDD<br>";
			return null; 
		}
	} 

	function deconnexion ($uneConnexion){
		mysqli_close ($uneConnexion) ;
	}

    function insertPilote($tab) {
		// Connect to the database
		$uneConnexion = connexion();
	
		// Prepare the SQL statement
		$requete = $uneConnexion->prepare("INSERT INTO pilote (idpilote, nom, prenom, licence) VALUES (NULL, ?, ?, ?)");
	
		// Bind the parameters
		$requete->bind_param("sss", $tab['nom'], $tab['prenom'], $tab['licence']);
	
		// Execute the statement
		$requete->execute();
	
		// Close the statement and connection
		$requete->close();
		deconnexion($uneConnexion);
	}

	

	function insertAvion($tab) {
		// Connect to the database
		$uneConnexion = connexion();

        if (empty($tab['modele']) || empty($tab['capacite']) || empty($tab['fabrication'])) {
            die("Erreur : Tous les champs doivent être remplis.");
        }
	
		// Prepare the SQL statement
		$requete = $uneConnexion->prepare("INSERT INTO avion (idavion, modele, capacite, fabrication) VALUES (NULL, ?, ?, ?)");
	
        $modele = trim($tab['modele']);
        $capacite = (int) $tab['capacite']; // Convertir en entier
        $fabrication = trim($tab['fabrication']);

		// Bind the parameters
		$requete->bind_param("sis", $tab['modele'], $tab['capacite'], $tab['fabrication']);
	
		// Execute the statement
		$requete->execute();
	
		// Close the statement and connection
		$requete->close();
		deconnexion($uneConnexion);
	}

	function insertVol($tab) {
		// Connect to the database
		$uneConnexion = connexion();
	
		// Debugging: Print the values being inserted
		echo "Inserting vol with idpilote: " . $tab['idpilote'] . ", idavion: " . $tab['idavion'];
	
		// Prepare the SQL statement
		$requete = $uneConnexion->prepare("INSERT INTO vol (idvol, idpilote, idavion, dated, datea, lieud, lieua) VALUES (NULL, ?, ?, ?, ?, ?, ?)");
	
		// Bind the parameters
		$requete->bind_param("iissss", $tab['idpilote'], $tab['idavion'], $tab['dated'], $tab['datea'], $tab['lieud'], $tab['lieua']);
	
		// Execute the statement
		$requete->execute();
	
		// Close the statement and connection
		$requete->close();
		deconnexion($uneConnexion);
	}
	
    function insertVoyageur($tab) {
		// Connect to the database
		$uneConnexion = connexion();
	
		// Prepare the SQL statement
		$requete = $uneConnexion->prepare("INSERT INTO voyageur (idvoyageur, nomv, prenomv, email, telephone) VALUES (NULL, ?, ?, ?, ?)");
	
		// Bind the parameters
		$requete->bind_param("ssss", $tab['nomv'], $tab['prenomv'], $tab['email'], $tab['telephone']);
	
		// Execute the statement
		$requete->execute();
	
		// Close the statement and connection
		$requete->close();
		deconnexion($uneConnexion);
	}

	
	function insertBillet($tab) {
		// Connect to the database
		$uneConnexion = connexion();
	
		// Debugging: Print the values being inserted
		echo "Inserting billet with idvol: " . $tab['idvol'] . ", idbillet: " . $tab['idbillet'];
	
		// Prepare the SQL statement
		$requete = $uneConnexion->prepare("INSERT INTO billet (idbillet, idvol, idbillet, nump, classe, prix) VALUES (NULL, ?, ?, ?, ?, ?)");
	
		// Bind the parameters
		$requete->bind_param("iissi", $tab['idvol'], $tab['idbillet'], $tab['nump'], $tab['classe'], $tab['prix']);
	
		// Execute the statement
		$requete->execute();
	
		// Close the statement and connection
		$requete->close();
		deconnexion($uneConnexion);
	}
	
	

	function selectAllPilotes ()
	{
		$requete = "select * from pilote ;"; 
		$uneConnexion = connexion();
		$lesPilotes = mysqli_query($uneConnexion, $requete);
		deconnexion($uneConnexion);
		return $lesPilotes; 
	}
	function selectAllAvions ()
	{
		$requete = "select * from avion ;"; 
		$uneConnexion = connexion();
		$lesAvions = mysqli_query($uneConnexion, $requete);
		deconnexion($uneConnexion);
		return $lesAvions; 
	}
	function selectAllVols ()
	{
		$requete = "select * from vol ;"; 
		$uneConnexion = connexion();
		$lesVols = mysqli_query($uneConnexion, $requete);
		deconnexion($uneConnexion);
		return $lesVols; 
	}
	function selectAllVoyageurs ()
	{
		$requete = "select * from voyageur ;"; 
		$uneConnexion = connexion();
		$lesVoyageurs = mysqli_query($uneConnexion, $requete);
		deconnexion($uneConnexion);
		return $lesVoyageurs; 
	}
    function selectAllBillets ()
	{
		$requete = "select * from billet ;"; 
		$uneConnexion = connexion();
		$lesBillets = mysqli_query($uneConnexion, $requete);
		deconnexion($uneConnexion);
		return $lesBillets; 
	}

	function deletePilote ($idpilote){
		$uneConnexion = connexion(); 
		$requete ="delete from pilote where idpilote =".$idpilote.";";
		mysqli_query($uneConnexion, $requete);
		deconnexion($uneConnexion);
	}
	function deleteAvion ($idavion){
		$uneConnexion = connexion(); 
		$requete ="delete from avion where idavion =".$idavion.";";
		mysqli_query($uneConnexion, $requete);
		deconnexion($uneConnexion);
	}
	function deleteVol ($idvol){
		$uneConnexion = connexion(); 
		$requete ="delete from vol where idvol =".$idvol.";";
		mysqli_query($uneConnexion, $requete);
		deconnexion($uneConnexion);
	}
	function deleteVoyageur ($idbillet){
		$uneConnexion = connexion(); 
		$requete ="delete from voyageur where idbillet =".$idbillet.";";
		mysqli_query($uneConnexion, $requete);
		deconnexion($uneConnexion);
	}
    function deleteBillet ($idbillet){
		$uneConnexion = connexion(); 
		$requete ="delete from billet where idbillet =".$idbillet.";";
		mysqli_query($uneConnexion, $requete);
		deconnexion($uneConnexion);
	}
	function editPilote($idpilote, $tab) {
		$uneConnexion = connexion();
	
		if (!$uneConnexion) {
			die("Erreur de connexion : " . mysqli_connect_error());
		}
	
		$requete = $uneConnexion->prepare("UPDATE pilote SET nom = ?, prenom = ?, licence = ? WHERE idpilote = ?");
		
		if (!$requete) {
			die("Erreur de préparation : " . $uneConnexion->error);
		}
	
		$requete->bind_param("sssi", $tab['nom'], $tab['prenom'], $tab['licence'], $idpilote);
	
		if (!$requete->execute()) {
			die("Erreur d'exécution : " . $requete->error);
		}
	
		echo "Mise à jour réussie !";
	
		$requete->close();
		deconnexion($uneConnexion);
	}
	
	function editAvion($idavion, $tab) {
		$uneConnexion = connexion();
	
		if (!$uneConnexion) {
			die("Erreur de connexion : " . mysqli_connect_error());
		}
	
		$requete = $uneConnexion->prepare("UPDATE avion SET modele = ?, capacite = ?, fabrication = ? WHERE idavion = ?");
		
		if (!$requete) {
			die("Erreur de préparation : " . $uneConnexion->error);
		}
	
		$requete->bind_param("sisi", $tab['modele'], $tab['capacite'], $tab['fabrication'], $idavion);
	
		if (!$requete->execute()) {
			die("Erreur d'exécution : " . $requete->error);
		}
	
		echo "Mise à jour réussie !";
	
		$requete->close();
		deconnexion($uneConnexion);
	}

	function editVol($idvol, $tab) {
		$uneConnexion = connexion();
	
		if (!$uneConnexion) {
			die("Erreur de connexion : " . mysqli_connect_error());
		}
	
		$requete = $uneConnexion->prepare("UPDATE vol SET dated = ?, datea = ?, lieud = ?, lieua = ? WHERE idvol = ?");
		
		if (!$requete) {
			die("Erreur de préparation : " . $uneConnexion->error);
		}
	
		$requete->bind_param("ssssi", $tab['dated'], $tab['datea'], $tab['lieud'], $tab['lieua'], $idvol);
	
		if (!$requete->execute()) {
			die("Erreur d'exécution : " . $requete->error);
		}
	
		echo "Mise à jour réussie !";
	
		$requete->close();
		deconnexion($uneConnexion);
	}
	
	function editVoyageur($idbillet, $tab) {
		$uneConnexion = connexion();
	
		if (!$uneConnexion) {
			die("Erreur de connexion : " . mysqli_connect_error());
		}
	
		$requete = $uneConnexion->prepare("UPDATE voyageur SET nomv = ?, prenomv = ?, email = ?, telephone = ? WHERE idbillet = ?");
		
		if (!$requete) {
			die("Erreur de préparation : " . $uneConnexion->error);
		}
	
		$requete->bind_param("ssssi", $tab['nomv'], $tab['prenomv'], $tab['email'], $tab['telephone'], $idbillet);
	
		if (!$requete->execute()) {
			die("Erreur d'exécution : " . $requete->error);
		}
	
		echo "Mise à jour réussie !";
	
		$requete->close();
		deconnexion($uneConnexion);
	}

    function editBillet($idbillet, $tab) {
		$uneConnexion = connexion();
	
		if (!$uneConnexion) {
			die("Erreur de connexion : " . mysqli_connect_error());
		}
	
		$requete = $uneConnexion->prepare("UPDATE billet SET nump = ?, classe = ?, prix = ? WHERE idbillet = ?");
		
		if (!$requete) {
			die("Erreur de préparation : " . $uneConnexion->error);
		}
	
		$requete->bind_param("ssii", $tab['nump'], $tab['classe'], $tab['prix'], $idbillet);
	
		if (!$requete->execute()) {
			die("Erreur d'exécution : " . $requete->error);
		}
	
		echo "Mise à jour réussie !";
	
		$requete->close();
		deconnexion($uneConnexion);
	}
	
?> 
