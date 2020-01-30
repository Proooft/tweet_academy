  <header>
    <div class="container-fluid">
      <!-- bandeau menu principal -->
      <div id="logo_back">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="div_menu">
                <?php if (!isset($_SESSION['pseudo'])) : ?>
                  <a href="index.php"><img src="assets/img/accueil_gris.png" alt="accueil" class="menu_icone">Accueil</a>
                <?php else : ?>
                  <a href="fil_actualite.php?color=true"><img src="assets/img/accueil_gris.png" alt="accueil" class="menu_icone">Accueil</a>
                  <a href="#"><img src="assets/img/mail_gris.png" alt="enveloppe" class="menu_icone">Messages</a>
                  <a href="deconnexion.php"><img src="assets/img/deconnexion_gris.png" alt="enveloppe" class="menu_icone">Deconnexion</a>
                <?php endif; ?>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="div_menu_logo">
                <a href="#"><img src="assets/img/chauvesouris.png" alt="cliquer sur le logo" class="menu_logo"></a>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="div_menu_avatar">
                <?php ob_start();
                if (isset($_SESSION['pseudo'])) : ?>
                  <a href="fil_actualite.php?color=true" class="bouton">Sqweel</a>
                  <a href="profil.php?color=true&consultation=true"><?php echo '<img class="menu_avatar" src="data:' . $result['extension'] . ';base64,' . base64_encode($result['photo_avatar']) . '" alt="photo"><br>'; ?></a>
                <?php endif; ?>
                <!-- <a href=""><img src="assets/img/2wKZG3pUsyNW4BvTLtqUq1jrM5k.jpg" class="menu_avatar" alt="photo de l'avatar"></a> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- bandeau photographie -->
      <div class="bandeau_photo"></div>

      <!-- liste d'en-tête -->
      <ul class="nav justify-content-center">
        <?php if (isset($countTweet)) { ?>
          <li><a href="profil.php?color=true&consultation=true"> <?= $countTweet["CountTweet"]; ?> Sqweels</a></li>
          <?php } ?>

          <?php if (isset($countFollower)) { ?>
            <li><a href="fil_actualite.php?color=true&user=<?= $pseudo["pseudo"]; ?>&follower=true"><?= $countFollower['CountFollower']; ?> Abonnements</a></li>
            <li><a href="fil_actualite.php?color=true&user=<?= $pseudo["pseudo"]; ?>&following=true"><?= $countFollowing["CountFollowing"]; ?> Abonnés</a></li>
          <?php } ?>
          <li><a href="#">Editer le profil</a></li>
        </ul>
      </div>
    </header>