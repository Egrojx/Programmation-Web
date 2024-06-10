<?php
include 'config.php';
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$types_plats = liste_types_plats($conn);
$types_cuisines = liste_types_cuisines($conn);

$id_recette = $_GET['id'];
$sql = "SELECT * FROM Recette WHERE id_recette=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_recette);
$stmt->execute();
$result = $stmt->get_result();
$recette = $result->fetch_assoc();

$sql_ingredients = "SELECT * FROM Ingredient INNER JOIN Quantite ON Ingredient.id_ingredient = Quantite.id_ingredient WHERE Quantite.id_recette=?";
$stmt_ingredients = $conn->prepare($sql_ingredients);
$stmt_ingredients->bind_param("i", $id_recette);
$stmt_ingredients->execute();
$result_ingredients = $stmt_ingredients->get_result();

$sql_etapes = "SELECT * FROM Etape WHERE id_recette=? ORDER BY numero_etape";
$stmt_etapes = $conn->prepare($sql_etapes);
$stmt_etapes->bind_param("i", $id_recette);
$stmt_etapes->execute();
$result_etapes = $stmt_etapes->get_result();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Recette</title>
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
        <main class="conteneur-flex principal2" id="principal-container">
            <div class="description-plat">
                <img src="<?= $recette['image_url'] ?>" alt="image de la recette" id="image_url">
                <div class="recepie-details">
                    <h2 class="titrePlat" id="titre"><?= $recette['titre'] ?></h2>
                    <p id="type_de_plat"><?= $recette['id_type_plat'] ?></p>
                    <p id="type_de_cuisine"><?= $recette['id_type_cuisine'] ?></p>
                    <p id="temps_de_preparation"><?= $recette['temps_preparation'] ?></p>
                </div>
            </div>
<<<<<<< Updated upstream
        </div>
       

        <table class="tableau2" id="ingredients">
            <h2>Ingredients</h2>
            <thead>
                <tr>
                    <th>Nom Ingredient</th>
                    <th>Quantité(en tasses/cuillère)</th>
                    <th>Quantité(en g)</th>
                </tr>
            </thead>
            <tbody id="ingredient-table">
                <tr>
                    <td>Persil</td>
                    <td></td>
                    <td>0.120g</td>
                </tr>
                <tr>
                    <td>Ail</td>
                    <td></td>
                    <td>16g</td>
                </tr>
                <tr>
                    <td>Sel</td>
                    <td>1 cuillere</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Oignon</td>
                    <td></td>
                    <td>100g</td>
                </tr>
                <tr>
                    <td>Tomate</td>
                    <td></td>
                    <td>200g</td>
                </tr>
                <tr>
                    <td>Huile d'olive</td>
                    <td>2 cuilleres</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Baguette</td>
                    <td></td>
                    <td>600g</td>
                </tr>
                <tr>
                    <td>Chorizo</td>
                    <td></td>
                    <td>600g</td>
                </tr>
                
            </tbody>
        </table>
        
        <ol class="Etape" id="etapes">
            <h2 >Préparation</h2>
            <li>Piquez les chorizos avec les dents d’une fourchette.
                Faites-les cuire au grill ou à la plancha en les retournant 
                régulièrement. Pendant ce temps, mixez tous les ingrédients
                de la sauce chimichurri.
            </li>
            <li>
                Lavez et découpez les légumes en petits dés (tomates, poivron, 
                oignon), mélangez-les avec le gros sel, l’ail pressé, le persil
                haché et l’huile d’olive.
            </li>
            <li>
                Coupez la baguette en 4. Réchauffez les morceaux de baguette au 
                four. Ouvrez dans le sens de la longueur. Nappez de sauce 
                chimichurri, déposez la moitié d’un chorizo grillé par morceau 
                de baguette. Recouvrez de sauce salsa criolla avant de refermer 
                les sandwiches.
            </li>
        </ol>
    </main>

    <footer class="conteneur-flex pied">
        <p>© Recette de cuisine. Tous droits réservés Jorge Yepes, Sara 
            Yousuf
        </p>
    
    </footer>
</div>
=======
            <table class="tableau2" id="ingredients">
                <thead>
                    <tr>
                        <th>Nom Ingredient</th>
                        <th>Quantité(en tasses/cuillère)</th>
                        <th>Quantité(en g)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($ingredient = $result_ingredients->fetch_assoc()): ?>
                        <tr>
                            <td><?= $ingredient['nom'] ?></td>
                            <td><?= $ingredient['quantite_tasse_cuillere'] ?></td>
                            <td><?= $ingredient['quantite_grammes'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <table class="tableau2" id="etapes">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($etape = $result_etapes->fetch_assoc()): ?>
                        <tr>
                            <td><?= $etape['numero_etape'] ?></td>
                            <td><?= $etape['description'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </main>
        <footer class="conteneur-flex pied">
            <p>© Recette de cuisine. Tous droits réservés Jorge Yepes, Sara Yousuf</p>
        </footer>
    </div>
>>>>>>> Stashed changes
</body>
<script>
    document.addEventListener('DOMContentLoaded', () => {
  
  const url = new URL(window.location.href);

 
  const recetteId = url.searchParams.get('id');

  
  const recetteAfficher = recettes.find(recette => recette.id == recetteId);

  
  if (recetteAfficher) {
    afficher_recette(recetteAfficher, types_cuisines, types_plats);
  }
});
</script>
</html>



