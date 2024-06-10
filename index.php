<?php
include 'config.php';
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$types_plats = liste_types_plats($conn);
$types_cuisines = liste_types_cuisines($conn);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site de Recettes</title>
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="Recette.css">
    <script src="data.js" defer></script>
    <script src="script.js" defer></script>
</head>
<body>
    <div class="conteneur-grid">
        <header class="conteneur-flex entete2">
            <h1>Mon Site de Recettes</h1>
        </header>
        <nav class="conteneur-flex navigation2">
            <section class="filtres2">
                <label for="type-cuisine">Les types de cuisine :</label>
                <select id="type-cuisine">
                    <option value="">Tous</option>
                    <?php foreach($types_cuisines as $type): ?>
                        <option value="<?= $type['id_type_cuisine'] ?>"><?= $type['nom_type_cuisine'] ?></option>
                    <?php endforeach; ?>
                </select>
            </section>
            <section>
                <label for="type-plat">Type de plats :</label>
                <select id="type-plat">
                    <option value="">Tous</option>
                    <?php foreach($types_plats as $type): ?>
                        <option value="<?= $type['id_type_plat'] ?>"><?= $type['nom_type_plat'] ?></option>
                    <?php endforeach; ?>
                </select>
            </section>
        </nav>
        <main class="conteneur-flex principal2" id="recette-container">
                <article class="recette recetteA" id="choripan">
                    <img class="lesImages" src="images/argentinian-choripan-109514-1.jpeg" class="img" >
                    <h2>Choripan</h2>
                    <p>Le choripán est le nom donné en Argentine
                        à un sandwich constitué d'une saucisse et d'un petit pain, 
                        qui peut être mangé nature ou assaisonné de chimichurri, de
                        salsa golf (es) ou de salsa criolla.
                    </p>
                </article>
                <article class="recette recetteB">
                    <img class="lesImages" src="images/sous-marin-italien.jpeg" class="img" >
                    <h2>Sous marin à l'italienne</h2>
                    <p>
                        Ce sous-marin classique est garni de jambon Forêt-Noire Deli
                        Best, de bologne Blue Ribbon, de fromage, d'un pepperoncini
                        crémeux et d'une salade laitue « sous-marine ».
                    </p>
                </article>
                <article class="recette">
                    <img class="lesImages" src="images/0055-cari-vert-poulet.jpg" class="img" >
                    <h2>Cari vert au poulet</h2>
                    <p>
                        Ce cari de poulet est fait avec de la coriandre, des feuilles 
                        de lime kaffir, de la citronnelle et du lait de coco. Un 
                        véritable voyage en Thaïlande!
                    </p>
                </article>
        </main>
        <footer class="conteneur-flex pied">
            <p>© Recette de cuisine. Tous droits réservés Jorge Yepes, Sara Yousuf</p>
        </footer>
    </div>
</body>
<script>
document.addEventListener('DOMContentLoaded', () => {
  afficher_toutes_recettes(recettes);
});

document.addEventListener('DOMContentLoaded', () => {
  
  const accueilElement = document.getElementById('choripan');
 accueilElement.addEventListener('click', () => {
  window.location.href = `./RecettePrincipale.html?`;
  });
});
</script>
</html>



