<h3> ... des informations concerant un billet ! <h3>

<form method="post">
    <table>
        <tr>
            <td> Vol : </td>
            <td>
                <select name="idvol">
                    <?php
                    foreach ($lesVols as $unVol){
                        echo "<option value ='".$unVol['idvol']."'>";
                        echo $unVol['lieud'];
                        echo "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td> Voyageur : </td>
            <td>
                <select name="idvoyageur">
                    <?php
                    foreach ($lesVoyageurs as $unVoyageur){
                        echo "<option value ='".$unVoyageur['idvoyageur']."'>";
                        echo $unVoyageur['email'];
                        echo "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td> Numéro de place : </td>
            <td> <input type="text" name="nump"> </td>
        </tr>
        <tr>
            <td> Classe : </td>
            <td>
                <select name="classe">
                    <option value="Economie"> Économie </option>
                    <option value="Affaires"> Affaires </option>
                    <option value="Première"> Première </option>
                </select>
            </td>
        </tr>
        <tr>
            <td> Prix du billet : </td>
            <td> <input type="number" name="prix"> </td>
        </tr>
        <tr>
            <td> <input type="reset" name="Annuler" value="Annuler"> </td>
            <td> <input type="submit" name="Valider" value="Valider"> </td>
        </tr>
    </table>
</form>
