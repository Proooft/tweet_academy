<div class="container wrap">
   <ul id="commentaire">
      <?php while ($contenu_following = $following->fetch()) {
         $id_following = getIdFichePerso($contenu_following['pseudo']);
		   $id_following = intval($id_following['id_ficheperso']);
         // id_tweet	id_ficheperso	tweet_text	retweet	photo	date_publication	compteur_rt
         ?>
         <li class="commentaire">
            <div class="avatar">
               </div>
               <div class="commentaire-content">
                     <?= '<img src="data:' . $contenu_following['extension'] . ';base64,' . base64_encode($contenu_following['photo_avatar']) . '" alt="photo" height="55" width="55"><br>'; ?>
               <header>
                  <a href="profil.php?user=<?= $contenu_following['pseudo'] ?>&consultation=true" class="userlink"><?= $contenu_following['pseudo']; ?></a><span class="pubdate"><?= $contenu_following['phrase_humeur']; ?></span>
               </header>
               
               <span> <?php if (jeLeSuivre($id_ficheperso, $id_following) == 0){ ?> 
                  <a class="commentaire-link" href="profil.php?user=<?= $contenu_following['pseudo']; ?>&suivre=true&page_following=true&follower=<?=$contenu_following['id_following']?>">Suivre</a>
               <?php } else { ?>
                  <a class="commentaire-link" href="profil.php?user=<?= $contenu_following['pseudo']; ?>&desabonner=true&page_following=true&follower=<?=$contenu_following['id_following']?>">Desabonner</a>
               <?php } ?>
               </span>
            </div>
         <?php }
         ?>
      </li>
   </ul>
</div>