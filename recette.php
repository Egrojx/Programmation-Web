<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./normalize.css">
    <link rel="stylesheet" href="./Recette.css">
    <script src="data.js" ></script>
    <script src="script.js" ></script>
    
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
                    <option value="type">Argentine</option>
                    <option value="temps">Italie</option>
                    <option value="ingredients">Thailande</option>
                </select>
            </section>
            <section>
                <label for="filtre2">Type de plats:</label>
                <select id="type-plat">
                    <option value="">Tous</option>
                    <option value="type1">Plat principal</option>
                    <option value="type2">desserts</option>
                    <option value="type3">Entree</option>
                </select>
            </section>
        </nav>
    </div>



    <main class="conteneur-flex principal2 " id="principal-container">
        
        <div class="description-plat" id="desc-courte">
            <img src="images/argentinian-choripan-109514-1.jpeg" alt="image de la recette" id="image_url">
            <div class="recepie-details">
                <h2 class="titrePlat" id="titre">Choripan argentinian</h2>
                <p id="type_de_plat">&#x1F374;Type de plat: Plat principal</p>
                <p id="type_de_cuisine">&#x1F354;Type de cuisine: Argentine</p>
                <p id="temps_de_preparation">⏰Temps de préparation: 30 minutes</p>
            </div>
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
