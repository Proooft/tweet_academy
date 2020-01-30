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
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>