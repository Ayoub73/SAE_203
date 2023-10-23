<?php
$couleur_bulle_classe = "rose";
$page_active = "index";

require_once('./ressources/includes/connexion-bdd.php');

// à adapter
$articleCommand = $clientMySQL->prepare('SELECT * FROM article WHERE id = :id');
$articleCommand->execute([
    'id' => $_GET["id"],
]);
$article = $articleCommand->fetch();

$auteur_id = $article["auteur_id"];


if ($article["auteur_id"] == "") {
    $auteur_id = 2;
}
// echo $article["auteur_id"];

$nom_auteur = $clientMySQL->prepare('SELECT nom FROM auteur WHERE id = :id');
$nom_auteur->execute([
    'id' => $auteur_id,
]);
$auteur = $nom_auteur->fetch();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo getenv('CHEMIN_BASE') ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article - SAÉ 203</title>

    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/header.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/accueil.css">

    <link rel="stylesheet" href="ressources/css/global.css">
    <link rel="stylesheet" href="ressources/css/accueil.css">
    <link rel="stylesheet" href="ressources/css/article.css">
    <!-- ajout d'un favicon --> 
    <link rel="shortcut icon" type="image/png" href="https://lptm.cyu.fr/uas/cylptm/FAVICON/favicon-LPTM_400x400px.png" alt="logo">
</head>

<body>
    <section>
        <?php require_once('./ressources/includes/header.php'); ?>
        <?php
        // A supprimer si vous n'en avez pas besoin.
        // Mettre une couleur dédiée pour cette bulle si vous gardez la bulle
        require_once('./ressources/includes/bulle.php');
        ?>

        <!-- Nous affichons les informations de l'auteur ainsi que l'article et ses informations de la base de données  
        qui sont importés de la base de données-->
        <main class="conteneur-principal conteneur-1280">
            <section>
                <h1 class="titre-page"><?php echo $article["titre"]; ?></h1>
               
                <span class="image-rogne-cadre">
                    <img src=<?php echo $article["image"]; ?> alt="image de l'article">
                </span>
            </section>

            <section>
                 <h2 class="titre-page" id="chapo"><?php echo $article["chapo"]; ?></h2>
                 <p class="contenu-article"><?php echo $article["contenu"]; ?> </p>
            </section>
            
            <section class="info">
                <p >Date de création : <?php echo $article["date_creation"]; ?></p>

                <!-- on dit en dessous d'afficher la date de la dernière mise à jour si celle ci
                est différente de la date de création -->
                <p><?php if ($article["date_derniere_mise_a_jour"] != $article["date_creation"]) {
                        echo "Date de dernière mise à jour :", $article["date_derniere_mise_a_jour"];
         }          ?>
                </p>
                <p>Nom de l'auteur : <?php echo $auteur["nom"] ?></p>
                <p>ID de l'auteur : <?php echo $auteur_id ?></p>
            </section>
            
            <section> 
                <input type="button" class="bouton-redacteur" onclick="window.location.href = './redaction.php';" value="Voir l'équipe" />
            </section>
        </main>
        <?php require_once('./ressources/includes/footer.php'); ?>
    </section>
</body>

</html>