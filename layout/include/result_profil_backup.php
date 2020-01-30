<div class="container wrap">
    <h4>Profil</h4>
    <p>Bonjour <strong><?= $pseudo["pseudo"]; ?></strong>, vous pouvez regarder votre donnes ici:</p><br>
    <table class="table_donnes_user">
        <tr>
            <td class="titre_table">Pseudo</td>
            <td class="titre_table">Nom</td>
            <td class="titre_table">Prenom</td>
            <td class="titre_table">Date de naissance</td>
            <td class="titre_table">Sexe</td>
            <td class="titre_table">Pays</td>
            <td class="titre_table">Adresse mail</td>
            <td class="titre_table">Date de inscription</td>
            <td class="titre_table">Phrase de Humeur</td>
        </tr>
        <tr>
            <td><?= $pseudo["pseudo"]; ?></td>
            <td><?= $user["nom"]; ?></td>
            <td><?= $user["prenom"]; ?></td>
            <td><?= $user["date_de_naissance"]; ?></td>
            <td><?= $user["sexe"]; ?></td>
            <td><?= $user["pays"]; ?></td>
            <td><?= $user["adresse_mail"]; ?></td>
            <td><?= $pseudo["date_inscription"]; ?></td>
            <td><?= $profil["phrase_humeur"]; ?></td>
        </tr>
    </table>
    <?php echo '<img src="data:' . $result['extension'] . ';base64,' . base64_encode($result['photo_avatar']) . '" alt="photo" height="55" width="55"><br>'; ?>
</div>


<!-- 1er container-->
<div class="container">
    <div class="row">

        <!-- encadré gauche -->
        <div class="col-lg-3">
            <div class="encadre_gauche">
                <!-- avatar -->
                <div class="text-center">
                    <!-- <img src="assets/img/2wKZG3pUsyNW4BvTLtqUq1jrM5k.jpg" class="avatar" alt="photo de l'avatar"> -->
                    <?php echo '<img class="avatar" src="data:' . $result['extension'] . ';base64,' . base64_encode($result['photo_avatar']) . '" alt="photo"><br>'; ?>

                </div>

                <ul class="identifiant">
                    <li><a href="#" class="nom"><?= $user["nom"]; ?></a></li>
                    <li><a href="#"><?= $pseudo["pseudo"]; ?></a></li>
                    <li><?= $profil["phrase_humeur"]; ?></li>
                    <li><img src="assets/img/calendrier_gris.png" alt="icone calendrier"><?= $pseudo["date_inscription"]; ?></li>
                    <li><img src="assets/img/anniv_gris.png" alt="icone date d'anniversaire"><?= $user["date_de_naissance"]; ?></li>
                    <li><a href="#"><img src="assets/img/photo_gris.png" alt="icone photo">Photos et vidéos</a></li>
                </ul>

                <div class="image_perso">
                    <div class="row no-margin">
                        <!-- <div class="col-lg">
                                <div class="div_image"> -->
                        <img class="img-center" src="assets/img/image1.jpg" alt="image">
                        <img class="img-center" src="assets/img/image2.jpg" alt="image">
                        <!-- </div> -->
                        <!-- </div> -->
                        <!-- <div class="col-lg">
                                <div class="div_image"> -->
                        <img class="img-center" src="assets/img/image3.jpg" alt="image">
                        <img class="img-center" src="assets/img/image4.jpg" alt="image">
                        <!-- </div>
                            </div> -->
                        <!-- <div class="col-lg">
                                <div class="div_image"> -->
                        <img class="img-center" src="assets/img/image5.jpg" alt="image">
                        <img class="img-center" src="assets/img/image6.jpg" alt="image">
                        <!-- </div>
                            </div> -->
                    </div>
                </div>
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
                                <li><a href="#"><?= $pseudo["pseudo"]; ?></a></li>
                                <li></li>
                                <li><?= strftime("%A %d %B %Y"); ?></li>
                            </ul>
                        </div>
                    </div>

                    <div class="sqweel_include">
                        <p>Sqweel include</p>
                        <p>Insertion image</p>
                    </div>

                    <ul class="footer_sqweel">
                        <li><a href="#"><img src="assets/img/bulle_gris.png" alt="topic" class="icone">Nb commentaires</a></li>
                        <li><a href="#"><img src="assets/img/retweet_gris.png" alt="retweet" class="icone">Nb retweet</a></li>
                        <li><a href="#"><img src="assets/img/mail_gris.png" alt="enveloppe" class="icone"></a></li>
                    </ul>

                </div>

            </div>
        </div>

        <!-- encadré droite -->
        <div class="col-lg-3">
            <div class="encadre_droite">
                <div class="tendance text-center">
                    <p>Tendances</p>
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