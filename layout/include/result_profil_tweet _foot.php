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