<div class="container wrap">
   <ul id="commentaire">
      <?php 
      while ($contenu_follower = $follower->fetch()) {
         $id_follower = getIdFichePerso($contenu_follower['pseudo']);
         $id_follower = intval($id_follower['id_ficheperso']);
         $pseudo = getConnexion($id_follower);
         
         ?>
         <li class="commentaire">
            <div class="avatar">
               </div>
               <div class="commentaire-content">
                     <?= '<img src="data:' . $contenu_follower['extension'] . ';base64,' . base64_encode($contenu_follower['photo_avatar']) . '" alt="photo" height="55" width="55"><br>'; ?>
               <header>
                  <a href="profil.php?user=<?= $pseudo['pseudo']; ?>&consultation=true" class="userlink"><?= $contenu_follower['pseudo']; ?></a><span class="pubdate"><?= $contenu_follower['phrase_humeur']; ?></span>
               </header>
               
               <span> <?php if (jeLeSuivre($id_ficheperso, $id_follower) == 0){ ?> 
                  <a class="commentaire-link" href="profil.php?user=<?= $contenu_follower['pseudo']; ?>&suivre=true&page_following=true&follower=<?=$contenu_follower['id_follower']?>">Suivre</a>
               <?php } else { ?>
                  <a class="commentaire-link" href="profil.php?user=<?= $contenu_follower['pseudo']; ?>&desabonner=true&page_following=true&follower=<?=$contenu_follower['id_follower']?>">Desabonner</a>
               <?php } ?>
               </span>
            </div>
         <?php }
         ?>
      </li>
   </ul>
</div>