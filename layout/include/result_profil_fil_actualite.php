<!-- 1er container-->
<div class="container">
    <div class="row">

        <!-- encadré gauche -->
        <div class="col-lg-3">
            <div class="encadre_gauche">
                <!-- avatar -->
                <div class="text-center">
                    <!-- <img src="assets/img/2wKZG3pUsyNW4BvTLtqUq1jrM5k.jpg" class="avatar" alt="photo de l'avatar"> -->
                    <?php ob_start();
                    echo '<img class="avatar" src="data:' . $result['extension'] . ';base64,' . base64_encode($result['photo_avatar']) . '" alt="photo"><br>'; ?>

                </div>

                <ul class="identifiant">
                    <li><a href="#" class="nom"><?= $user["nom"]; ?></a></li>
                    <li><a href="#"><?= $pseudo["pseudo"]; ?></a></li>
                    <li><?= $profil["phrase_humeur"]; ?></li>
                    <li><img src="assets/img/calendrier_gris.png" alt="icone calendrier"><?= $pseudo["date_inscription"]; ?></li>
                    <li><img src="assets/img/anniv_gris.png" alt="icone date d'anniversaire"><?= $user["date_de_naissance"]; ?></li>
                    <li><a href="#"><img src="assets/img/photo_gris.png" alt="icone photo">Photos et vidéos</a></li>
                </ul>
                <div>
                    <?php if (isset($_GET['consultation'])===true) { ?>

                        <form name="connexion" action="profil.php?action=update_phrase_humeur&color=true" method="post" class="well">
                            <p class="phrase_de_humeur">Ecrivez votre nouvele phrase d'humeur</p>
                            <div>
                                <label for="pseudo">
                                    <p class="phrase_de_humeur">Phrase : </p>
                                </label>
                                <input type="text" name="phrase_humeur" value="" placeholder="Ecrivez votre phrase ici" required>
                            </div>
                            <div>
                                <input class="submit_phrase" type="submit" name="submit" value="Phrase">
                            </div>
                        </form>
                   <?php } ?>
                </div>

                <!-- <div class="image_perso">
                    <div class="row no-margin">
                         <div class="col-lg">
                                <div class="div_image"> -->
                <!-- <img class="img-center" src="assets/img/image1.jpg" alt="image">
                        <img class="img-center" src="assets/img/image2.jpg" alt="image"> -->
                <!-- </div> -->
                <!-- </div> -->
                <!-- <div class="col-lg">
                                <div class="div_image"> -->
                <!-- <img class="img-center" src="assets/img/image3.jpg" alt="image">
                        <img class="img-center" src="assets/img/image4.jpg" alt="image"> -->
                <!-- </div>
                            </div> -->
                <!-- <div class="col-lg">
                                <div class="div_image"> -->
                <!-- <img class="img-center" src="assets/img/image5.jpg" alt="image">
                        <img class="img-center" src="assets/img/image6.jpg" alt="image"> -->
                <!-- </div>
                            </div> -->
                <!-- </div>
                </div>  -->
            </div>
        </div>

        <!-- encadré centre -->
        <div class="col-lg-6">
            <div class="centre">
                <div class="sqweel">

                    <div class="row">
                        <div class="col-lg-2">
                            <!-- <img src="assets/img/2wKZG3pUsyNW4BvTLtqUq1jrM5k.jpg" class="miniature_avatar" alt="miniature de l'avatar"> -->
                            <?php echo '<img class="miniature_avatar" src="data:' . $result['extension'] . ';base64,' . base64_encode($result['photo_avatar']) . '" alt="photo"><br>'; ?>

                        </div>
                        <div class="col-lg-10">
                            <ul class="identifiant_sqweel">
                                <li><a href="#" class="nom"><?= $user["nom"]; ?></a></li>
                                <li><a href="#">@<?= $pseudo["pseudo"]; ?></a></li>
                                <li></li>
                                <li><?= strftime("%A %d %B %Y"); ?></li>
                            </ul>
                        </div>
                    </div>

                    <div class="sqweel_include">
                        <?php if (isset($_GET['follower']) === true) { ?>
                            <ul id="commentaire">
                                <h1 class="resume_actualite">Resume de Abonnements</h1>
                                <!-- <h2></h2> -->
                                <?php if ($follower->rowCount() == 0) { ?>
                                    <li class="commentaire">
                                        <!-- <div class="avatar">
                                        </div> -->
                                        <div class="commentaire-content">
                                            <h4 class="resume_actualite">Aucun Abonnement !</h4>
                                        </div>
                                    </li>
                                <?php } else { ?>
                                    <?php
                                    while ($contenu_follower = $follower->fetch()) {
                                        $id_follower = getIdFichePerso($contenu_follower['pseudo']);
                                        $id_follower = intval($id_follower['id_ficheperso']);
                                        $pseudo = getConnexion($id_follower);
                                        $follower->rowCount();
                                        ?>
                                        <li class="commentaire">
                                            <!-- <div class="avatar">
                                            </div> -->
                                            <div class="commentaire-content">
                                                <?= '<img src="data:' . $contenu_follower['extension'] . ';base64,' . base64_encode($contenu_follower['photo_avatar']) . '" alt="photo" height="55" width="55"><br>'; ?>
                                                <header>
                                                    <a href="profil.php?user=<?= $pseudo['pseudo']; ?>&consultation=true" class="userlink"><?= $contenu_follower['pseudo']; ?></a><span class="pubdate"><?= $contenu_follower['phrase_humeur']; ?></span>
                                                </header>

                                                <span> <?php if (jeLeSuivre($id_ficheperso, $id_follower) == 0) { ?>
                                                        <a class="bouton commentaire-link" href="fil_actualite.php?color=true&user=<?= $contenu_follower['pseudo']; ?>&suivre=true&page_follower=true&follower=<?= $id_follower ?>">Suivre</a>
                                                    <?php } else { ?>
                                                        <a class="bouton commentaire-link" href="fil_actualite.php?color=true&user=<?= $contenu_follower['pseudo']; ?>&desabonner=true&page_follower=true&follower=<?= $id_follower ?>">Desabonner</a>
                                                    <?php } ?>
                                                </span>
                                            </div>
                                        </li>
                                    <?php }
                                    ?>
                                <?php } ?>
                            </ul>
                        <?php } else if (isset($_GET['following']) === true) { ?>
                            <ul id="commentaire">
                                <h1 class="resume_actualite">Resume de Abonnés</h1>
                                <?php if ($following->rowCount() == 0) { ?>
                                    <li class="commentaire">
                                        <!-- <div class="avatar">
                                        </div> -->
                                        <div class="commentaire-content">
                                            <h4 class="resume_actualite">Aucun Abonnés !</h4>
                                        </div>
                                    <?php } else { ?>

                                        <?php while ($contenu_following = $following->fetch()) {
                                            $id_following = getIdFichePerso($contenu_following['pseudo']);
                                            $id_following = intval($id_following['id_ficheperso']);
                                            $id_follower = getIdFichePerso($contenu_follower['pseudo']);
                                            $id_follower = intval($id_follower['id_ficheperso']);
                                            // id_tweet	id_ficheperso	tweet_text	retweet	photo	date_publication	compteur_rt
                                            ?>
                                        <li class="commentaire">
                                            <!-- <div class="avatar">
                                        </div> -->
                                            <div class="commentaire-content">
                                                <?= '<img src="data:' . $contenu_following['extension'] . ';base64,' . base64_encode($contenu_following['photo_avatar']) . '" alt="photo" height="55" width="55"><br>'; ?>
                                                <header>
                                                    <a href="profil.php?user=<?= $contenu_following['pseudo'] ?>&consultation=true" class="userlink"><?= $contenu_following['pseudo']; ?></a><span class="pubdate"><?= $contenu_following['phrase_humeur']; ?></span>
                                                </header>

                                                <span> <?php if (jeLeSuivre($id_ficheperso, $id_following) == 0) { ?>
                                                        <a class="bouton commentaire-link" href="fil_actualite.php?color=true&user=<?= $contenu_following['pseudo']; ?>&suivre=true&page_follower=true&follower=<?= $id_following ?>">Suivre</a>
                                                    <?php } else { ?>
                                                        <a class="bouton commentaire-link" href="fil_actualite.php?color=true&user=<?= $contenu_following['pseudo']; ?>&desabonner=true&page_following=true&follower=<?= $id_following ?>">Desabonner</a>
                                                    <?php } ?>
                                                </span>
                                            </div>
                                        <?php }
                                        ?>
                                    </li>
                                <?php } ?>
                            </ul>

                        <?php } else { ?>

                            <!-- <div class="container wrap"> -->
                            <h1 class="resume_actualite">Resume de actualite</h1>
                            <?php if (isset($_GET['consultation']) !== true) { ?>
                                <form name="form1" method="post" action="fil_actualite.php?action=commentaire&color=true">
                                    <div>
                                        <textarea name="tweet_text" id="" cols="45" rows="5" placeholder="Votre Tweet ici" required><?php if (isset($_GET['user'])) { ?>@<?php echo $_GET['user'] . " ";
                                                                                                                                                                            } ?></textarea>
                                        <input type="hidden" name="id" <?php if (isset($_GET['id'])) { ?>value="<?php echo $_GET['id'];
                                                                                                                } ?>">
                                    </div>
                                    <div>
                                        <!-- <li><a href="#"><img src="assets/img/bulle_gris.png" alt="topic" class="icone">Commentaires</a></li> -->
                                        <img src="assets/img/bulle_gris.png" alt="topic" class="icone"><input class="submit bouton_comm" type="submit" <?php if (isset($_GET['id'])) { ?>name="commentaires" value="Commentaires" <?php } else { ?>name="sqweel" value="Sqweel" <?php } ?>>
                                    </div>
                                </form>
                            <?php } ?>
                            <!-- </div> -->
                            <!-- <p>Insertion image</p> -->
                            <ul id="commentaire">

                                <?php while ($contenu_tweet = $allTweet->fetch()) {
                                    $utilisateur = getUtilisateur($id_ficheperso);
                                    // $utilisateur = $utilisateurs->fetch();
                                    $table_connexion = getConnexion($id_ficheperso);
                                    $pseudo = $table_connexion['pseudo'];
                                    $id_follower = intval($contenu_tweet['id_ficheperso']);
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

                                            <span> <?php
                                                    //  var_dump($id_follower);
                                                    // var_dump($id_ficheperso);
                                                    if (jeLeSuivre($id_ficheperso, $id_follower) == 0 && $id_follower !== $id_ficheperso) { ?>
                                                    <a class="bouton commentaire-link" href="fil_actualite.php?color=true&user=<?= $contenu_tweet['pseudo']; ?>&suivre=true&follower=<?= $id_follower ?>">Suivre</a>
                                                <?php } else if ($id_follower !== $id_ficheperso) { ?>
                                                    <a class="bouton commentaire-link" href="fil_actualite.php?color=true&user=<?= $contenu_tweet['pseudo']; ?>&desabonner=true&follower=<?= $id_follower ?>">Desabonner</a>
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
                                                            <?php ob_start();
                                                            $id_follower = intval($rep['id_ficheperso']); ?>


                                                            <?= '<img class="avatar_img_retweet" src="data:' . $rep['extension'] . ';base64,' . base64_encode($rep['photo_avatar']) . '" alt="photo" height="55" width="55"><br>'; ?>
                                                        </div>
                                                        <div class="retweet-content">
                                                            <header>
                                                                <a href="profil.php?user=<?= $rep['pseudo']; ?>&consultation=true&color=true" class="bouton commentaire-link"><?= $rep['pseudo']; ?></a> - <span class="pubdate"><?= $contenu_tweet['date_publication']; ?></span>
                                                            </header>
                                                            <p>
                                                                <?= $rep['tweet_text']; ?>
                                                            </p>
                                                            <span> <?php
                                                                    //  var_dump($id_follower);
                                                                    // var_dump($id_ficheperso);
                                                                    if (jeLeSuivre($id_ficheperso, $id_follower) == 0 && $id_follower !== $id_ficheperso) { ?>
                                                                    <a class="bouton commentaire-link" href="fil_actualite.php?color=true&user=<?= $contenu_tweet['pseudo']; ?>&suivre=true&follower=<?= $id_follower ?>">Suivre</a>
                                                                <?php } else if ($id_follower !== $id_ficheperso) { ?>
                                                                    <a class="bouton commentaire-link" href="fil_actualite.php?color=true&user=<?= $contenu_tweet['pseudo']; ?>&desabonner=true&follower=<?= $id_follower ?>">Desabonner</a>
                                                                <?php } ?>
                                                            </span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            <?php }
                                        } ?>
                                    </li>
                                <?php } ?>
                            </ul>
                            <!-- </div> -->

                            <!-- <ul class="footer_sqweel">
                            <li><a href="#"><img src="assets/img/bulle_gris.png" alt="topic" class="icone">Nb commentaires</a></li>
                            <li><a href="#"><img src="assets/img/retweet_gris.png" alt="retweet" class="icone">Nb retweet</a></li>
                            <li><a href="#"><img src="assets/img/mail_gris.png" alt="enveloppe" class="icone"></a></li>
                        </ul> -->

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>



        <!-- encadré droite -->
        <div class="col-lg-3">
            <div class="encadre_droite">
                <div class="tendance text-center">
                    <p>Tendances</p>
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
                </div>

                <div class="footer">
                    <p><a href="">A propos</a>
                        <a href="">Centre d'assistance</a>
                        <a href="">Conditions</a>
                        <a href="">Politique de confidentialité</a>
                        <a href="">Cookies</a>
                        <a href="">Informations sur la publicité</a>
                        <a href="">©2019 Sqweel Academie</a></p>
                </div>
            </div>
        </div>


    </div>
</div>