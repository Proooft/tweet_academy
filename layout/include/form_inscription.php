
<div id="bandenoir">
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-6 gauche">
        </div>
        <div class="col-lg-6 droite">

            <!-- <div class="container">
    <div class="row">
        <div class="col-md-6 gauche">
        </div>
        <div class="col-md-6 droite"> -->
            <h1 class="titre">Sqweel Academie</h1>

            <!-- <div class="container wrap"> -->
            <!-- <div class="wrap"> -->
                <p id="creervotre">Créer votre compte gratuitement</p id="creervotre">
            <form name="inscription" action="acces_utilisateur.php?action=S'inscrire" method="post" enctype="multipart/form-data"  onsubmit="return showAlert()">
                <div class="formulaire">
                    <input type="text" name="nom" value="" placeholder="Nom" required>
                </div>
                <div class="formulaire">
                    <input type="text" name="prenom" value="" placeholder="Prénom" required>
                </div>
                <div class="formulaire">
                    <input type="text" name="pseudo" value="" id="username" placeholder="Pseudo" onKeyUp="verifPseudo(this.value)" required><span id="update"></span>  
                </div>
                <div class="formulaire">
                    <input type="email" name="adresse_mail" id="mail" value="" placeholder="exemple@exemple.com" onKeyUp="verifEmail(this.value)" required><span id="UPemail"></span>
                </div>
                <div class="formulaire">
                    <?php include 'menu_deroulant.php' ?>
                </div>
                <div class="formulaire">
                    <label for="date_de_naissance">Date de Naissance : </label>
                </div>
                <div class="formulaire">
                    <input type="date" name="date_de_naissance" value="" required>
                </div>
                <div class="formulaire">
                    <input type="password" name="password" value="" placeholder="Mot de passe" required>
                </div>
                <div class="formulaire">
                    <input type="password" name="confirm_password" value="" placeholder="Confirmation de mot de passe" required>
                </div>
                <div class="formulaire">
                    <label for="sexe">Sexe : &nbsp; </label>
                </div>
                <div>
                    <input type="radio" name="sexe" value="non-genre" checked> Non-genré <input type="radio" name="sexe" value="masculin"> Masculin <input type="radio" name="sexe" value="feminin"> Féminin
                </div>
                <div class="formulaire">
                    <label for="avatar">Ajoutez un Avatar de votre choix :</label>
                </div>
                <div>
                    <input class="parcourir" type="file" name="photo_avatar" id="photo_avatar" /><br />
                    <!-- <label for="validation">Valider : </label><input type="submit" name="validation" id="validation" value="Envoyer" /> -->
                </div>
                <div>
                    <input class="submit" id='test' type="submit" name="submit" value="S'inscrire">
                </div>
            </form>
            <!-- </div> -->
        </div>
    </div>
</div>