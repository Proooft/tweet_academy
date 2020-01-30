<div class="col-lg-6">
   <div class="centre">
      <div class="sqweel">

         <div class="row">
            <div class="col-lg-2">

            </div>
            <div class="col-lg-10">

            </div>
         </div>

         <div class="sqweel_include">
            <ul id="commentaire">

               <?php while ($contenu_tweet = $allTweet->fetch()) {
                  $utilisateur = getUtilisateur($id_ficheperso);
                  // $utilisateur = $utilisateurs->fetch();
                  $table_connexion = getConnexion($id_ficheperso);
                  $pseudo = $table_connexion['pseudo'];
                  // id_tweet	id_ficheperso	tweet_text	retweet	photo	date_publication	compteur_rt
                  ?>
                  <li class="commentaire">
                     <div class="avatar_tweet">
                        <?php ob_start(); ?>

                        <?= '<img class="avatar_img_tweet" src="data:' . $contenu_tweet['extension'] . ';base64,' . base64_encode($contenu_tweet['photo_avatar']) . '" alt="photo" height="55" width="55"><br>'; ?>
                     </div>
                     <div class="commentaire-content">
                        <header>
                           <a href="profil.php?user=<?= $contenu_tweet['pseudo']; ?>&consultation=true&color=true" class="bouton userlink"><?= $contenu_tweet['pseudo']; ?></a><span class="pubdate"><?= $contenu_tweet['date_publication']; ?></span>
                        </header>
                        <p>
                           <?= $contenu_tweet['tweet_text']; ?>
                        </p>
                        <span>
                           <a class="bouton commentaire-link" href="fil_actualite.php?user=<?= $contenu_tweet['pseudo']; ?>&id=<?= $contenu_tweet['id_tweet']; ?>&color=true">
                              Commentaire
                           </a>
                        </span>
                        <span> <?php if (jeLeSuivre($id_ficheperso, $id_follower) == 0 && $id_follower !== $_SESSION['id_ficheperso']) { ?>
                              <a class="commentaire-link" href="profil.php?user=<?= $contenu_follower['pseudo']; ?>&suivre=true&page_following=true&follower=<?= $contenu_follower['id_follower'] ?>">Suivre</a>
                           <?php } else if ($id_follower !== $_SESSION['id_ficheperso']) { ?>
                              <a class="commentaire-link" href="profil.php?user=<?= $contenu_follower['pseudo']; ?>&desabonner=true&page_following=true&follower=<?= $contenu_follower['id_follower'] ?>">Desabonner</a>
                           <?php } ?>
                        </span>

                     </div>
                     <?php
                     $contar = countReTweet($contenu_tweet['id_tweet']);
                     $result = $contar->fetch();
                     if ($result['cantite_retweet'] != '0') {
                        $retweet = getAllReTweet($contenu_tweet['id_tweet']);
                        while ($rep = $retweet->fetch()) { ?>
                           <ul class="replies">
                              <li class="retweet">
                                 <div class="avatar_retweet">
                                    <?php ob_start(); ?>

                                    <?= '<img class="avatar_img_retweet" src="data:' . $rep['extension'] . ';base64,' . base64_encode($rep['photo_avatar']) . '" alt="photo" height="55" width="55"><br>'; ?>
                                 </div>
                                 <div class="retweet-content">
                                    <header>
                                       <a href="profil.php?user=<?= $rep['pseudo']; ?>&consultation=true&color=true" class="bouton commentaire-link"><?= $rep['pseudo']; ?></a> - <span class="pubdate"><?= $contenu_tweet['date_publication']; ?></span>
                                    </header>
                                    <p>
                                       <?= $rep['tweet_text']; ?>
                                    </p>
                                 </div>
                              </li>
                           </ul>
                        <?php }
                     }
                  } ?>
               </li>
            </ul>
         </div>

         <ul class="footer_sqweel">

         </ul>

      </div>

   </div>
</div>