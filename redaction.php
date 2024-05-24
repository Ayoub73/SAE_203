<?php
$couleur_bulle_classe = "bleu";
$page_active = "redaction";

require_once('./ressources/includes/connexion-bdd.php');


$auteursCommand = $clientMySQL->prepare('SELECT * FROM auteur');
$auteursCommand->execute();
$auteurs = $auteursCommand->fetchAll();

foreach ($auteurs as $auteur) {
    
}
$lien_avatar = $auteur["lien_avatar"];
$nom = $clientMySQL->prepare('SELECT nom FROM auteur WHERE id = :id');
$prenom = $clientMySQL->prepare('SELECT prenom FROM auteur WHERE id = :id');
$lien_twitter = $clientMySQL->prepare('SELECT lien_twitter FROM auteur WHERE id = :id');


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo getenv('CHEMIN_BASE') ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipe de rédaction - SAÉ 203</title>

    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/header.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/accueil.css">

    <link rel="stylesheet" href="ressources/css/equipe_de_redaction.css">
    <link rel="stylesheet" href="ressources/css/global.css">
    
    <!-- ajout d'un favicon --> 
    <link rel="shortcut icon" type="image/png" href="https://lptm.cyu.fr/uas/cylptm/FAVICON/favicon-LPTM_400x400px.png" alt="logo">
</head>


<body>
    <section>
        <?php require_once('./ressources/includes/header.php'); ?>
        <?php
        // facultatif
        require_once('./ressources/includes/bulle.php');
        ?>

    <h1 class="titre_redaction">Les membres de l'équipe de rédaction</h1>
        <main class="conteneur-principal conteneur-1280">
            
            <section class="colonne">
                <section class="liste-auteurs">
                    <?php foreach ($auteurs as $auteur) { ?>
 
                        <!-- Nous affichons les données des auteurs qui ont été importés de la base de données-->
                        <div class="bloc_auteurs">

                            <img src="<?php echo $auteur["lien_avatar"]; ?>" class="avatar_css" alt="avatar de l'auteur"> 

                            <p>Membre numéro : <?php echo $auteur["id"]; ?></p>

                            <p class="identite"><?php echo $auteur["prenom"]; ?> <?php echo $auteur["nom"]; ?></p>
                            
                            <a href=<?php echo $auteur["lien_twitter"]; ?> class="compte_twitter"> 
                            
                            <!-- Pour le lien twitter, on a décidé de mettre une image du logo qui redirige directement vers le lien et non
                            un simple lien hypertexte -->
                            <img src="./ressources/images/logo-twitter.png" class="image-twitter" alt="Twitter-logo"></a>                     

                        </div>

                    <?php } ?>
        </main>

        </main>
        <?php require_once('./ressources/includes/footer.php'); ?>
    </section>
</body>

</html>
