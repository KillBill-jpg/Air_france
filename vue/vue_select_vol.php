<h3> Liste des Vols <h3>

<table border="1">
    <tr>
        <td> ID Vol </td>
        <td> ID Pilote </td>
        <td> ID Avion </td>
        <td> Date de départ </td>
        <td> Date d'arrivée </td>
        <td> Lieu de départ </td>
        <td> Lieu d'arrivée </td>
    </tr>

    <?php
    foreach ($lesVols as $unVol) {
        echo " <tr> ";
        echo " <td> ".$unVol['idvol']." </td> ";
        echo " <td> ".$unVol['idpilote']." </td> ";
        echo " <td> ".$unVol['idavion']." </td> ";
        echo " <td> ".$unVol['dated']." </td> ";
        echo " <td> ".$unVol['datea']." </td> ";
        echo " <td> ".$unVol['lieud']." </td> ";
        echo " <td> ".$unVol['lieua']." </td> ";
        echo " <td> ";
        echo "<a href='index.php?page=4&action=sup&idvol=" . urlencode($unVol['idvol']) . "'> <img src='images/supprimer.png' height='30' width='30'> </a>"; 
        echo "<a href='index.php?page=4&action=edit&idvol=" . urlencode($unVol['idvol']) . "'> <img src='images/editer.png' height='30' width='30'> </a>";
        echo " </td> ";
        echo " </tr> ";
    }