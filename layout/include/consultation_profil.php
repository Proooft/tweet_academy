<div class="container wrap">
    <!-- <h4>Profil</h4>  -->
    
    <p><strong><?= $montreprofil["pseudo"]; ?></strong></p><br>
    <table class="table_donnes_user">
        <tr>
            <td class="titre_table">Pseudo</td>
            <td class="titre_table">Nom</td>
            <td class="titre_table">Prenom</td>
            <td class="titre_table">Date de naissaince</td>
            <td class="titre_table">Sexe</td>
            <td class="titre_table">Pays</td>
        </tr>
        <tr>
            <td>@<?=$montreprofil["pseudo"]; ?></td>
            <td><?= $montreprofil["nom"]; ?></td>
            <td><?= $montreprofil["prenom"]; ?></td>
            <td><?= $montreprofil["date_de_naissance"]; ?></td>
            <td><?= $montreprofil["sexe"]; ?></td>
            <td><?= $montreprofil["pays"]; ?></td>
        </tr>
    </table>
    <span> <?php if ($id_ficheperso != $id_follower) { if (jeLeSuivre($id_ficheperso, $id_follower) == 0){ ?> 
                  <a class="commentaire-link" href="profil.php?user=<?= $pseudo; ?>&suivre=true&consultation=true&follower=<?=$id_follower?>">Suivre</a>
               <?php } else { ?>
                  <a class="commentaire-link" href="profil.php?user=<?= $pseudo; ?>&desabonner=true&consultation=true&follower=<?=$id_follower?>">Desabonner</a>
               <?php } }?>
               </span>
    <?php 
    ob_start();
    echo '<img src="data:' . $montreprofil['extension'] . ';base64,' . base64_encode($montreprofil['photo_avatar']) . '" alt="photo" height="55" width="55"><br>'; ?>
</div>