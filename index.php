<?php

require_once 'config.php';
require_once 'router.php';
require 'routes.php';


$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

if (function_exists('dispatch')) {
    dispatch($uri);
}

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$types_plats = liste_types_plats($pdo);
$types_cuisines = liste_types_cuisines($pdo);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/Recette.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <div class="conteneur-grid">
        <header class="conteneur-flex entete2">
            <h1>Mon Site de Recettes</h1>
        </header>

        <nav class="conteneur-flex navigation2">
            <section class="filtres2">
                <label for="filtres">Les types de cuisine:</label>
                <select name="filtres" id="type-cuisine">
                    <option value="">Tous</option>
                    <?php foreach ($types_cuisines as $cuisine): ?>
                        <option value="<?= $cuisine['id'] ?>"><?= $cuisine['nom'] ?></option>
                    <?php endforeach; ?>
                </select>
            </section>
            <section>
                <label for="filtre2">Type de plats:</label>
                <select id="type-plat">
                    <option value="">Tous</option>
                    <?php foreach ($types_plats as $type): ?>
                        <option value="<?= $type['id'] ?>"><?= $type['nom'] ?></option>
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

    <script>
        async function fetchRecettes() {

            const response = await fetch('/api/recettes');
                
            const data = await response.json();
            
            
            afficher_toutes_recettes(data); 
            
        }

        async function fetchRecettesType(typePlatId) {
            const recetteContainer = document.getElementById('recette-container');
            recetteContainer.innerHTML = ''; 

            const response = await fetch(`/api/recettes/type_plat/${typePlatId}`);
                
            const data = await response.json();
            afficher_toutes_recettes(data); 
            
        }

        document.addEventListener('DOMContentLoaded', () => {
            const typePlatSelect = document.getElementById('type-plat');
            typePlatSelect.addEventListener('change', () => {
                const typePlatId = typePlatSelect.value;
                if (typePlatId) {
                    fetchRecettesType(typePlatId);
                } else {
                    fetchRecettes();
                }
            });

            
            fetchRecettes();

            const accueilElement = document.getElementById('choripan');
            accueilElement.addEventListener('click', () => {
                window.location.href = `./recette.php?`;
            });
        });
    </script>
</body>
</html>
