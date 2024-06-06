
function afficher_resume_recette(recette) {
  // Créer un élément div pour la recette
  const recetteDiv = document.createElement('div');
  recetteDiv.classList.add('recette');

  // Ajouter l'image de la recette
  const imageElement = document.createElement('img');
  imageElement.src = recette.image_url;
  recetteDiv.appendChild(imageElement);

  // Ajouter le titre de la recette
  const titreElement = document.createElement('h3');
  titreElement.textContent = recette.titre;
  recetteDiv.appendChild(titreElement);

  // Ajouter la description courte de la recette
  const descriptionElement = document.createElement('p');
  descriptionElement.textContent = recette.desc_courte;
  recetteDiv.appendChild(descriptionElement);

  // Ajouter un gestionnaire d'événement pour le clic sur la recette
  recetteDiv.addEventListener('click', () => {
    window.location.href = `./RecettePrincipale.html?id=${recette.id}`;
  });

  // Ajouter la recette à la page d'accueil
  const accueilElement = document.getElementById('recette-container');
  accueilElement.appendChild(recetteDiv);
}

function afficher_toutes_recettes(recettes) {
  recettes.forEach(recette => {
    afficher_resume_recette(recette);
  });
}


// Déclencher le chargement des données lors du chargement de la page
document.addEventListener('DOMContentLoaded', () => {
  afficher_toutes_recettes(recettes);
});


///////////////////////////////////////////////////////



function afficher_recette(recette, types_cuisines, types_plats) {
  // Récupérer les éléments DOM pour les titres, les images, les détails, les ingrédients et les étapes de préparation
  const titreElement = document.querySelector('.titrePlat');
  const imageElement = document.querySelector('#image_url');
  const typePlatElement = document.querySelector('#type_de_plat');
  const typeCuisineElement = document.querySelector('#type_de_cuisine');
  const tempsPreparationElement = document.querySelector('#temps_preparation');
  const ingredientsTable = document.querySelector('#ingredient-table');
  const etapesList = document.querySelector('.Etape');

  // Remplir les données de la recette dans les éléments DOM correspondants
  titreElement.textContent = recette.titre;
  imageElement.src = recette.image_url;
  typePlatElement.innerHTML = `&#x1F374; Type de plat: ${types_plats[recette.type_de_plat-1].nom}`;
  typeCuisineElement.innerHTML = `&#x1F354; Type de cuisine: ${types_cuisines[recette.type_de_cuisine-1].nom}`;

  // Extraire le nombre de minutes de la chaîne de caractères
const tempsPreparationMinutes = parseInt(recette.temps_de_preparation);

// Afficher le temps de préparation avec le nombre de minutes
tempsPreparationElement.textContent = `⏰ Temps de préparation: ${tempsPreparationMinutes} minutes`;
 
// Remplir les ingrédients dans le tableau
  ingredientsTable.innerHTML = '';
  recette.ingredients.forEach(ingredient => {
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td>${ingredient.nom}</td>
      <td>${ingredient.quantite}</td>
      <td>${ingredient.quantite_equivalente}</td>
    `;
    ingredientsTable.appendChild(tr);
  });

  // Remplir les étapes de préparation dans la liste ordonnée
  etapesList.innerHTML = '';
  recette.etapes_de_preparation.forEach(etape => {
    const li = document.createElement('li');
    li.textContent = etape;
    etapesList.appendChild(li);
  });
}



document.addEventListener('DOMContentLoaded', () => {
  // Obtenir l'URL actuelle
  const url = new URL(window.location.href);

  // Obtenir l'identifiant de la recette à partir des paramètres de l'URL
  const recetteId = url.searchParams.get('id');

  // Trouver la recette correspondante dans le tableau de recettes
  const recetteAfficher = recettes.find(recette => recette.id == recetteId);

  // Si la recette est trouvée, l'afficher
  if (recetteAfficher) {
    afficher_recette(recetteAfficher, types_cuisines, types_plats);
  } else {
    console.error(`Aucune recette trouvée avec l'identifiant ${recetteId}`);
  }
});

