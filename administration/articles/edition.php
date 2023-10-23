<?php
require_once('../../ressources/includes/connexion-bdd.php');

$listeAuteursCommande = $clientMySQL->prepare('SELECT * FROM auteur');
$listeAuteursCommande->execute();
$listeAuteurs = $listeAuteursCommande->fetchAll();

$pageCourante = "articles";

$formulaire_soumis = !empty($_POST);
$entree_mise_a_jour = array_key_exists("id", $_GET);

$article = null;
if ($entree_mise_a_jour) {
    $chercherArticlecommande = $clientMySQL->prepare('SELECT * FROM article WHERE id = :id');
    $chercherArticlecommande->execute([
        "id" => $_GET["id"]
    ]);

    $article = $chercherArticlecommande->fetch();
}

if ($formulaire_soumis) {
    // On crée une nouvelle entrée
    $date_derniere_mise_a_jour = new DateTimeImmutable();

    $editerArticlecommande = $clientMySQL->prepare("
        UPDATE article
        SET titre = :titre, chapo = :chapo, contenu = :contenu, image = :image, date_derniere_mise_a_jour = :date_derniere_mise_a_jour, lien_yt = :lien_yt
        WHERE id = :id
    ");

    $editerArticlecommande->execute([
        "titre" => $_POST["titre"],
        "chapo" => $_POST["chapo"],
        "contenu" => $_POST["contenu"],
        "image" => $_POST["image"],
        "date_derniere_mise_a_jour" => $date_derniere_mise_a_jour->format('Y-m-d H:i:s'),
        // La date est formatée en chaîne de caractères
            // au format Année-mois-jour Heure:minutes:secondes
            // Sinon, elle ne pourra pas être 
            // insérée dans la base de données
        "lien_yt" => $_POST["lien_yt"],
        "id" => $_POST["id"]
    ]);
    $racineURL = pathinfo($_SERVER['REQUEST_URI']);
    $pageRedirection = $racineURL['dirname'];
    header("Location: $pageRedirection");
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once("../ressources/includes/head.php"); ?>

    <!-- ajout d'un favicon --> 
    <link rel="shortcut icon" type="image/png" href="https://lptm.cyu.fr/uas/cylptm/FAVICON/favicon-LPTM_400x400px.png" alt="logo">

    <title>Editer Articles - Administration</title>
    <script src="administration/Java-admin.js" defer></script>
</head>

<body>
    <div class="d-flex h-100">
        <?php include_once("../ressources/includes/menu-lateral.php"); ?>
        <div class="b-example-divider"></div>
        <main class="flex-fill">
            <header class="d-flex justify-content-between align-items-center p-3">
                <p class="fs-1">Editer</p>
            </header>

            <section class="p-3">
                <?php if ($article) { ?>
                    <form method="POST" action="">
                        <section class="row flex-column">
                            <input type="hidden" value="<?php echo $article["id"]; ?>" name="id">
                            <div class="mb-3 col-md-6">
                                <label for="titre" class="form-label">Titre</label>
                                <input type="text" value="<?php echo $article["titre"]; ?>" name="titre" class="form-control" id="titre">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="chapo" class="form-label">Chapô</label>
                                <input type="text" value="<?php echo $article["chapo"]; ?>" name="chapo" class="form-control" id="chapo">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="contenu" class="form-label">Contenu</label>
                                <textarea name="contenu" class="form-control" id="contenu"><?php echo $article["contenu"]; ?></textarea>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="image" class="form-label">Image</label>
                                <!-- on utilise les data-attributes pour connecter l'image au fichier javascript -->
                                <input data-input-image type="text" value="<?php echo $article["image"]; ?>" name="image" class="form-control" id="image">
                                <img data-image src="<?php echo $article["image"]; ?>" alt="">
                            </div>
                            <div class="form-text">
                                    Mettre l'URL de l'image (chemin absolu)
                                </div>
                            <div class="mb-3 col-md-6">
                                <label for="lien_yt" class="form-label">Lien Youtube</label>
                                <input type="text" value="<?php echo $article["lien_yt"]; ?>" name="lien_yt" class="form-control" id="lien_yt">
                            </div>

                            <div class="mb-3 col-md-6">
                            <label for="auteur-select">Auteur</label>
                            <select name="auteur" id="auteur-select">

                            <option disabled>Choisir un auteur</option>

                        <?php 
                        foreach ($listeAuteurs as $auteur) {
                        ?>


                        <option value=<?php echo $auteur["id"] ?>><?php echo $auteur["nom"] . " " . $auteur["prenom"] ?></option>
                                

                        <?php } ?>
                            </select>
                        </div>
                        
                            <div class="mb-3  col-md-6">
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </div>
                        </section>
                    </form>
                <?php } else { ?>
                    <p>Cet article n'existe pas</p>
                <?php } ?>
            </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>