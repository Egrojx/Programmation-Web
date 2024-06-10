
function afficher_resume_recette(recette) {
  
  const recetteDiv = document.createElement('div');
  recetteDiv.classList.add('recette');

  
  const imageElement = document.createElement('img');
  imageElement.src = recette.image_url;
  recetteDiv.appendChild(imageElement);

  
  const titreElement = document.createElement('h2');
  titreElement.textContent = recette.titre;
  recetteDiv.appendChild(titreElement);

  
  const descriptionElement = document.createElement('p');
  descriptionElement.textContent = recette.desc_courte;
  recetteDiv.appendChild(descriptionElement);

  
  recetteDiv.addEventListener('click', () => {
    window.location.href = `./RecettePrincipale.html?id=${recette.id}`;
  });

  
  const accueilElement = document.getElementById('recette-container');
  accueilElement.appendChild(recetteDiv);
}

function afficher_toutes_recettes(recettes) {
  recettes.forEach(recette => {
    afficher_resume_recette(recette);
  });
}






///////////////////////////////////////////////////////



function afficher_recette(recette, types_cuisines, types_plats) {
  
  const titreElement = document.querySelector('.titrePlat');
  const imageElement = document.querySelector('#image_url');
  const typePlatElement = document.querySelector('#type_de_plat');
  const typeCuisineElement = document.querySelector('#type_de_cuisine');
  const tempsPreparationElement = document.querySelector('#temps_de_preparation');
  const ingredientsTable = document.querySelector('#ingredient-table');
  const etapesList = document.querySelector('.Etape');

  
  titreElement.textContent = recette.titre;
  imageElement.src = recette.image_url;


  const typePlat = types_plats.find(type_plat => type_plat.id === recette.id);
  const typeCuisine= types_cuisines.find(type_cuisine => type_cuisine.id === recette.id);

  if (typePlat) {
    typePlatElement.innerHTML = `&#x1F374; Type de plat: ${typePlat.nom}`;
  }

  if(typeCuisine){
    typeCuisineElement.innerHTML = `&#x1F354; Type de cuisine: ${typeCuisine.nom}`;
  }

 

tempsPreparationElement.textContent = `⏰ Temps de préparation: ${recette.temps_de_preparation}`;
 


// Efface le contenu de la table
ingredientsTable.innerHTML = '';

// Crée un fragment de document pour éviter les manipulations répétées du DOM
const fragment = document.createDocumentFragment();

// Parcours des ingrédients et création des lignes
recette.ingredients.forEach(ingredient => {
  const tr = document.createElement('tr');

  // Crée les cellules de la ligne et ajoute le texte directement
  const tdNom = document.createElement('td');
  tdNom.textContent = ingredient.nom;

  const tdQuantiteEquivalente = document.createElement('td');
  tdQuantiteEquivalente.textContent = ingredient.quantite_equivalente;

  const tdQuantite = document.createElement('td');
  tdQuantite.textContent = ingredient.quantite;

  // Ajoute les cellules à la ligne
  tr.appendChild(tdNom);
  tr.appendChild(tdQuantiteEquivalente);
  tr.appendChild(tdQuantite);

  // Ajoute la ligne au fragment
  fragment.appendChild(tr);
});

// Ajoute le fragment à la table en une seule opération
ingredientsTable.appendChild(fragment);


  
  etapesList.innerHTML = '';

  const h2 = document.createElement('h2');
    h2.textContent = "Préparation";
    etapesList.appendChild(h2);

  recette.etapes_de_preparation.forEach(etape => {
    
    const li = document.createElement('li');
    li.textContent = etape;
    etapesList.appendChild(li);
  });
}


