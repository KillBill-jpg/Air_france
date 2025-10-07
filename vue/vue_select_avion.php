<h3> Liste des Avions </h3>

<table border="1">
    <tr>
        <td> ID Avion </td>
        <td> Modèle </td>
        <td> Capacité </td>
        <td> Année de fabrication </td>
    </tr>

    <?php
    foreach ($lesAvions as $unAvion) {
        echo " <tr> ";
        echo " <td> ".$unAvion['idavion']." </td> ";
        echo " <td> ".$unAvion['modele']." </td> ";
        echo " <td> ".$unAvion['capacite']." </td> ";
        echo " <td> ".$unAvion['fabrication']." </td> ";
        echo " <td> ";
        echo "<a href='index.php?page=3&action=sup&idavion=" . urlencode($unAvion['idavion']) . "'> <img src='images/supprimer.png' height='30' width='30'> </a>"; 
        echo "<a href='index.php?page=3&action=edit&idavion=" . urlencode($unAvion['idavion']) . "'> <img src='images/editer.png' height='30' width='30'> </a>";
        echo " </td> ";
        echo " </tr> ";
    }
    ?>
</table>