<h3> ... "Quand vais-je m'envoler" ?,<h3>

<form method="post">
    <table>
        <tr>
            <td> Pilote : </td>
            <td>
                <select name="idpilote">
                    <?php
                    foreach ($lesPilotes as $unPilote){
                        echo "<option value ='".$unPilote['idpilote']."'>";
                        echo $unPilote['licence'];
                        echo "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td> Avion : </td>
            <td>
                <select name="idavion">
                    <?php
                    foreach ($lesAvions as $unAvion){
                        echo "<option value ='".$unAvion['idavion']."'>";
                        echo $unAvion['modele'];
                        echo "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td> Date de Départ : </td>
            <td> <input type="datetime-local" name="dated"> </td>
        </tr>
        <tr>
            <td> Date d'Arrivée : </td>
            <td> <input type="datetime-local" name="datea"> </td>
        </tr>
        <tr>
            <td> Lieu de Départ : </td>
            <td> <input type="text" name="lieud"> </td>
        </tr>
        <tr>
            <td> Lieu d'Arrivée : </td>
            <td> <input type="text" name="lieua"> </td>
        </tr>
        <tr>
            <td> <input type="reset" name="Annuler" value="Annuler"> </td>
            <td> <input type="submit" name="Valider" value="Valider"> </td>
        </tr>
    </table>
</form>
