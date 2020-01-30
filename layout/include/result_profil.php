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
                                <li><a href="#">@<?= $pseudo["pseudo"]; ?></a></li>
                                <li></li>
                                <li><?= strftime("%A %d %B %Y"); ?></li>
                            </ul>
                        </div>
                    </div>