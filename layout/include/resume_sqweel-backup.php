<div class="container wrap">
   <?php while ($hashtag_count = $hashtag->fetch()) { ?>
      <div class="hashtgag">
         <ul class="hashtag_list">
            <li class="hashtag_list">
               <div>
                  <h4>
                     <?= $hashtag_count['Cant_hashtag'] ?>
                     <?= $hashtag_count['nom_hash'] ?>
                  </h4>
               </div>
            </li>
         </ul>
      </div>
   <?php } ?>
   <ul id="commentaire">

      <?php while ($contenu_tweet = $allTweet->fetch()) {
         $utilisateur = getUtilisateur($id_ficheperso);
         // $utilisateur = $utilisateurs->fetch();
         $table_connexion = getConnexion($id_ficheperso);
         $pseudo = $table_connexion['pseudo'];
         // id_tweet	id_ficheperso	tweet_text	retweet	photo	date_publication	compteur_rt
         ?>
         <li class="commentaire">
            <div class="avatar">
               <?= '<img src="data:' . $contenu_tweet['extension'] . ';base64,' . base64_encode($contenu_tweet['photo_avatar']) . '" alt="photo" height="55" width="55"><br>'; ?>
            </div>
            <div class="commentaire-content">
               <header>
                  <a href="profil.php?user=<?= $contenu_tweet['pseudo']; ?>&consultation=true" class="userlink"><?= $contenu_tweet['pseudo']; ?></a><span class="pubdate"><?= $contenu_tweet['date_publication']; ?></span>
               </header>
               <p>
                  <?= $contenu_tweet['tweet_text']; ?>
               </p>
               <span>
                  <a class="commentaire-link" href="fil_actualite.php?user=<?= $contenu_tweet['pseudo']; ?>&id=<?= $contenu_tweet['id_tweet']; ?>">
                     Commentaire
                  </a>
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
                        <div class="avatar-retweet">
                           <?php ob_start(); ?>

                           <?= '<img src="data:' . $rep['extension'] . ';base64,' . base64_encode($rep['photo_avatar']) . '" alt="photo" height="55" width="55"><br>'; ?>
                        </div>
                        <div class="retweet-content">
                           <header>
                              <a href="profil.php?user=<?= $rep['pseudo']; ?>&consultation=true" class="userlink-retweet"><?= $rep['pseudo']; ?></a> - <span class="pubdate"><?= $contenu_tweet['date_publication']; ?></span>
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
            <div class="avatar">
               <?= '<img src="data:' . $contenu_tweet['extension'] . ';base64,' . base64_encode($contenu_tweet['photo_avatar']) . '" alt="photo" height="55" width="55"><br>'; ?>
            </div>
            <div class="commentaire-content">
               <header>
                  <a href="profil.php?user=<?= $contenu_tweet['pseudo']; ?>&consultation=true" class="userlink"><?= $contenu_tweet['pseudo']; ?></a><span class="pubdate"><?= $contenu_tweet['date_publication']; ?></span>
               </header>
               <p>
                  <?= $contenu_tweet['tweet_text']; ?>
               </p>
               <span>
                  <a class="commentaire-link" href="fil_actualite.php?user=<?= $contenu_tweet['pseudo']; ?>&id=<?= $contenu_tweet['id_tweet']; ?>">
                     Commentaire
                  </a>
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
                        <div class="avatar-retweet">
                           <?php ob_start(); ?>

                           <?= '<img src="data:' . $rep['extension'] . ';base64,' . base64_encode($rep['photo_avatar']) . '" alt="photo" height="55" width="55"><br>'; ?>
                        </div>
                        <div class="retweet-content">
                           <header>
                              <a href="profil.php?user=<?= $rep['pseudo']; ?>&consultation=true" class="userlink-retweet"><?= $rep['pseudo']; ?></a> - <span class="pubdate"><?= $contenu_tweet['date_publication']; ?></span>
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