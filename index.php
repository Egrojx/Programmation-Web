<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./normalize.css">
    <link rel="stylesheet" href="./Recette.css">
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
                <label for="filtres">Les types de cuisine:</label>
                <select name="filtres" id="type-cuisine">
                    <option value="">Tous</option>
                    <option value="1">Indienne</option>
                    <option value="2">Américaine</option>
                    <option value="3">Italienne</option>
                    <option value="4">Mexicaine</option>
                    <option value="5">Française</option>
                    <option value="6">Chinoise</option>
                    <option value="7">Internationale</option>
                    <option value="8">Québécoise</option>
                    <option value="9">Maghrébine</option>
                </select>
            </section>
            <section>
                <label for="filtre2">Type de plats:</label>
                <select id="type-plat">
                    <option value="">Tous</option>
                    <option value="1">Plat principal</option>
                    <option value="2">Salade</option>
                    <option value="3">Pâtes</option>
                    <option value="4">Tacos</option>
                    <option value="5">Soupe</option>
                    <option value="6">Riz</option>
                    <option value="7">Dessert</option>
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
            <p>© Recette de cuisine. Tous droits réservés Jorge Yepes, Sara 
                Yousuf
            </p>
        </footer>
    </div>
</body>
</html>
