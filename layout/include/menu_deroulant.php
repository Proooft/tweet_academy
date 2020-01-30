<html>


<!-- //RECHERCHE DE PAYS PAR MENU DÉROULANT -->
<select name="pays" id="pays">
    <?php
    $liste = '<option value="" selected="true">Choisissez un pays</option>';
    $result = $bdd->query('SELECT id_pays, nom_fr FROM pays ORDER BY nom_fr');
    while ($row = $result->fetch()) {
        $id_pays = $row['id_pays'];
        $pays = $row['nom_fr'];
        $liste .= '<option value=' . $pays . '>' . $pays . '</option>';
    }
    echo $liste;
    $result->closeCursor();
    ?>
</select>
</html>