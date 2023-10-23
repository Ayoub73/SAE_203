<nav class="navigation-principale conteneur-1280">
    <ul>
        <li <?php if ($page_active == "index") {
                echo "class='active'";
            } ?>><a href="./index.php">ACCUEIL</a>
        </li>
        <li <?php if ($page_active == "apropos") {
                echo "class='active'";
            } ?>><a href="./a-propos.php">À PROPOS</a></li>
        <li <?php if ($page_active == "redaction") {
                echo "class='active'";
            } ?>><a href="./redaction.php">ÉQUIPE DE RÉDACTION</a></li>
        <li <?php if ($page_active == "medias") {
                echo "class='active'";
            } ?>><a href="./sur-les-medias.php">SUR LES MÉDIAS</a></li>
        <li <?php if ($page_active == "contact") {
                echo "class='active'";
            } ?>><a href="./contact.php">CONTACT</a></li>
        <li class="lien-admin"><a href="./administration/auteurs">Administration</a></li>
    </ul>
</nav>