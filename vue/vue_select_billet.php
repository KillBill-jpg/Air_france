<h3> Liste des Billets <h3>

<table border="1">
    <tr>
        <td> ID Billet </td>
        <td> ID Vol </td>
        <td> ID Voyageur </td>
        <td> Numéro de place </td>
        <td> Classe </td>
        <td> Prix </td>
    </tr>

    <?php
    foreach ($lesBillets as $unBillet) {
        echo " <tr> ";
        echo " <td> ".$unBillet['idbillet']." </td> ";
        echo " <td> ".$unBillet['idvol']." </td> ";
        echo " <td> ".$unBillet['idvoyageur']." </td> ";
        echo " <td> ".$unBillet['nump']." </td> ";
        echo " <td> ".$unBillet['classe']." </td> ";
        echo " <td> ".$unBillet['prix']." </td> ";
        echo " <td> ";
        echo "<a href='index.php?page=6&action=sup&idbillet=" . urlencode($unBillet['idbillet']) . "'> <img src='images/supprimer.png' height='30' width='30'> </a>"; 
        echo "<a href='index.php?page=6&action=edit&idbillet=" . urlencode($unBillet['idbillet']) . "'> <img src='images/editer.png' height='30' width='30'> </a>";
        echo " </td> ";
        echo " </tr> ";
    }