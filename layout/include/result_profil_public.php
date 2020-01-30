<div class="container wrap">
<h4>Consultation du Profil</h4> 
   <ul id="commentaire">
      <?php while ($contenu_tweet = $allTweetPseudo->fetch()) { ?>
         <li class="commentaire">
            <div class="avatar">
               <?='<img src="data:' . $contenu_tweet['extension'] . ';base64,' . base64_encode($contenu_tweet['photo_avatar']) . '" alt="photo" height="55" width="55"><br>'; ?>
            </div>
            <div class="commentaire-content">
               <header>
                  <?php if ($id_ficheperso != $id_follower) { ?>
                     <h3 href="profil.php?user=<?=$contenu_tweet['id_ficheperso']; ?>"><?=$contenu_tweet['pseudo']; ?></h3><span class="pubdate"><?=$contenu_tweet['date_publication']; ?></span>
                  <?php } else {
                     ?>
                     <a href="profil.php?user=<?=$contenu_tweet['pseudo']; ?>" class="userlink"><?=$contenu_tweet['pseudo']; ?></a><span class="pubdate"><?=$contenu_tweet['date_publication']; ?></span>

                     <?php }?>
               </header>
               <p>
                  <?=$contenu_tweet['tweet_text']; ?>
               </p>
               <span>
                  <a class="retweet" href="fil_actualite.php?user=<?=$contenu_tweet['id_ficheperso']; ?>&id=<?=$contenu_tweet['id_tweet']; ?>">
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
                        <div class="avatar">
                           <?='<img src="data:' . $rep['extension'] . ';base64,' . base64_encode($rep['photo_avatar']) . '" alt="photo" height="55" width="55"><br>'; ?>
                        </div>
                        <div class="retweet-content">
                           <header>
                              <a href="#" class="userlink"><?=$contenu_tweet['pseudo']; ?></a> - <span class="pubdate"><?=$contenu_tweet['date_publication']; ?></span>
                           </header>
                           <p>
                              <?=$rep['tweet_text']; ?>
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