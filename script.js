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



document.addEventListener('DOMContentLoaded', () => {
  afficher_toutes_recettes(recettes);
});


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
  typePlatElement.innerHTML = `&#x1F374; Type de plat: ${types_plats[recette.type_de_plat-1].nom}`;
  typeCuisineElement.innerHTML = `&#x1F354; Type de cuisine: ${types_cuisines[recette.type_de_cuisine-1].nom}`;

tempsPreparationElement.textContent = `⏰ Temps de préparation: ${recette.temps_de_preparation}`;
 

  ingredientsTable.innerHTML = '';
  recette.ingredients.forEach(ingredient => {
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td>${ingredient.nom}</td>
      <td>${ingredient.quantite_equivalente}</td>
      <td>${ingredient.quantite}</td>
    `;
    ingredientsTable.appendChild(tr);
  });

  
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



document.addEventListener('DOMContentLoaded', () => {
  
  const url = new URL(window.location.href);

 
  const recetteId = url.searchParams.get('id');

  
  const recetteAfficher = recettes.find(recette => recette.id == recetteId);

  
  if (recetteAfficher) {
    afficher_recette(recetteAfficher, types_cuisines, types_plats);
  }
});

//////////////////////////////////////////////////


  document.addEventListener('DOMContentLoaded', () => {
  
    const accueilElement = document.getElementById('choripan');
   accueilElement.addEventListener('click', () => {
    window.location.href = `./RecettePrincipale.html?`;
    });
  });
  
