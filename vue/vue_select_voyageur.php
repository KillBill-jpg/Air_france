<h3> Liste des Voyageurs <h3>

<table border="1">
    <tr>
        <td> ID Voyageur </td>
        <td> Nom du voyageur </td>
        <td> Prénom du voyageur </td>
        <td> Email </td>
        <td> Numéro de téléphone </td>
    </tr>

    <?php
    foreach ($lesVoyageurs as $unVoyageur) {
        echo " <tr> ";
        echo " <td> ".$unVoyageur['idvoyageur']." </td> ";
        echo " <td> ".$unVoyageur['nomv']." </td> ";
        echo " <td> ".$unVoyageur['prenomv']." </td> ";
        echo " <td> ".$unVoyageur['email']." </td> ";
        echo " <td> ".$unVoyageur['telephone']." </td> ";
        echo " <td> ";
        echo "<a href='index.php?page=5&action=sup&idvoyageur=" . urlencode($unVoyageur['idvoyageur']) . "'> <img src='images/supprimer.png' height='30' width='30'> </a>"; 
        echo "<a href='index.php?page=5&action=edit&idvoyageur=" . urlencode($unVoyageur['idvoyageur']) . "'> <img src='images/editer.png' height='30' width='30'> </a>";
        echo " </td> ";
        echo " </tr> ";
    }