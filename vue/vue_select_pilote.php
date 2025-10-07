<h3> Liste des Pilotes <h3>

<table border="1">
    <tr>
        <td> ID Pilote </td>
        <td> Nom </td>
        <td> Prénom </td>
        <td> Licence </td>
    </tr>

    <?php
    foreach ($lesPilotes as $unPilote) {
        echo " <tr> ";
        echo " <td> ".$unPilote['idpilote']." </td> ";
        echo " <td> ".$unPilote['nom']." </td> ";
        echo " <td> ".$unPilote['prenom']." </td> ";
        echo " <td> ".$unPilote['licence']." </td> ";
        echo " <td> ";
        echo "<a href='index.php?page=2&action=sup&idpilote=" . urlencode($unPilote['idpilote']) . "'> <img src='images/supprimer.png' height='30' width='30'> </a>"; 
        echo "<a href='index.php?page=2&action=edit&idpilote=" . urlencode($unPilote['idpilote']) . "'> <img src='images/editer.png' height='30' width='30'> </a>";
        echo " </td> ";
        echo " </tr> ";
    }