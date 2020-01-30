<!-- <div class="container wrap"> -->
<div class="menu">
  <ul class="ul_tweet">
    <?php if (isset($_SESSION['pseudo'])) : ?>
      <li class="il_tweet"><a href="fil_actualite.php">Sqweel Academie</a></li>
    <?php else : ?>
      <li class="il_tweet"><a href="index.php">Sqweel Academie</a></li>
    <?php endif; ?>
    <!-- <li><a href="index.php">Sqweel Academie</a></li> -->
    <?php if (isset($_SESSION['pseudo'])) : ?>
      <li class="il_tweet"><a href="profil.php">Accès au Profil</a></li>
      <li class="il_tweet"><a href="deconnexion.php">Deconnexion</a></li>
    <?php else : ?>
      <!-- <li><a href="acces_utilisateur.php">Accès Utilisateur</a></li> -->
    <?php endif; ?>
    <!-- <li><a href="historique_add.php">Ajouter une entrée à l'historique</a></li> -->
    <!-- <li><a href="about.asp">About</a></li> -->
  </ul>
</div>
<header>
  <div class="container-fluid">
    <!-- bandeau menu principal -->
    <div id="logo_back">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="div_menu">
              <?php if (!isset($_SESSION['pseudo'])) : ?>
                <a href="fil_actualite.php?color=true"><img src="assets/img/accueil_gris.png" alt="accueil" class="menu_icone">Accueil</a>
              </div>
              <?php else : ?>
                    <a href="index.php"><img src="assets/img/accueil_gris.png" alt="accueil" class="menu_icone">Accueil</a>
                    <a href="#"><img src="assets/img//mail_gris.png" alt="enveloppe" class="menu_icone">Messages</a>
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="div_menu_logo">
                    <a href="#"><img src="assets/img/chauvesouris.jpg" alt="cliquer sur le logo" class="menu_logo"></a>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="div_menu_avatar">
                    <?php if (isset($_SESSION['pseudo'])) : ?>
                      <a href="profil.php?color=true"><?php echo '<img class="menu_avatar" src="data:' . $result['extension'] . ';base64,' . base64_encode($result['photo_avatar']) . '" alt="photo"><br>'; ?></a>
                      <a href="deconnexion.php">Deconnexion</a>
                    <?php else : ?>
                      <!-- <li><a href="acces_utilisateur.php">Accès Utilisateur</a></li> -->
                    <?php endif; ?>
                    <!-- <a href=""><img src="assets/img/2wKZG3pUsyNW4BvTLtqUq1jrM5k.jpg" class="menu_avatar" alt="photo de l'avatar"></a> -->
                    <a href="index.php" class="bouton">Sqweel</a>
                  </div>
                </div>
                <!-- bandeau photographie -->
                <div class="bandeau_photo"></div>
            
                <!-- liste d'en-tête -->
                <ul class="nav justify-content-center">
                  <li><a href="#">Sqweels</a></li>
                  <li><a href="#">Abonnements</a></li>
                  <li><a href="#">Abonnés</a></li>
                  <li><a href="#">Editer le profil</a></li>
                </ul>
              </div>
          <?php endif; ?>

        </div>
      </div>
    </div>

</header>