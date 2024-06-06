const recettes = [
    {
        "id": 1,
        "titre": "Poulet au Curry",
        "temps_de_preparation": "45 minutes",
        "type_de_plat": 1,
        "type_de_cuisine": 1,
        "desc_courte": "Poulet mijoté au curry et lait de coco.",
        "ingredients": [
            {
                "nom": "Poulet",
                "quantite": "500g",
                "quantite_equivalente": "2 tasses"
            },
            {
                "nom": "Curry en poudre",
                "quantite": "2 cuillères à soupe",
                "quantite_equivalente": "2 cuillères à soupe"
            },
            {
                "nom": "Lait de coco",
                "quantite": "400ml",
                "quantite_equivalente": "1 2/3 tasses"
            },
            {
                "nom": "Oignon",
                "quantite": "1",
                "quantite_equivalente": "1/2 tasse"
            },
            {
                "nom": "Ail",
                "quantite": "2 gousses",
                "quantite_equivalente": "2 cuillères à café"
            }
        ],
        "etapes_de_preparation": [
            "Couper le poulet en morceaux.",
            "Émincer l'oignon et hacher l'ail.",
            "Faire revenir l'oignon et l'ail dans une poêle avec un peu d'huile.",
            "Ajouter le poulet et faire cuire jusqu'à ce qu'il soit doré.",
            "Incorporer le curry en poudre et mélanger bien.",
            "Ajouter le lait de coco et laisser mijoter pendant 20 minutes."
        ],
        "image_url": "https://images.pexels.com/photos/674574/pexels-photo-674574.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
    },
    {
        "id": 2,
        "titre": "Salade César",
        "temps_de_preparation": "20 minutes",
        "type_de_plat": 2,
        "type_de_cuisine": 2,
        "desc_courte": "Salade classique avec poulet, croutons et sauce César.",
        "ingredients": [
            {
                "nom": "Laitue romaine",
                "quantite": "1 tête",
                "quantite_equivalente": "6 tasses"
            },
            {
                "nom": "Croutons",
                "quantite": "1 tasse",
                "quantite_equivalente": "1 tasse"
            },
            {
                "nom": "Parmesan râpé",
                "quantite": "1/2 tasse",
                "quantite_equivalente": "1/2 tasse"
            },
            {
                "nom": "Poulet grillé",
                "quantite": "200g",
                "quantite_equivalente": "1 tasse"
            },
            {
                "nom": "Sauce César",
                "quantite": "1/4 tasse",
                "quantite_equivalente": "1/4 tasse"
            }
        ],
        "etapes_de_preparation": [
            "Laver et couper la laitue romaine.",
            "Griller le poulet et le couper en tranches.",
            "Dans un grand saladier, mélanger la laitue, les croutons et le parmesan.",
            "Ajouter le poulet grillé.",
            "Verser la sauce César et bien mélanger avant de servir."
        ],
        "image_url": "https://images.pexels.com/photos/406152/pexels-photo-406152.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
    },
    {
        "id": 3,
        "titre": "Pâtes à la Carbonara",
        "temps_de_preparation": "30 minutes",
        "type_de_plat": 3,
        "type_de_cuisine": 3,
        "desc_courte": "Spaghettis aux lardons, œufs, parmesan et crème.",
        "ingredients": [
            {
                "nom": "Spaghettis",
                "quantite": "400g",
                "quantite_equivalente": "4 tasses"
            },
            {
                "nom": "Lardons",
                "quantite": "150g",
                "quantite_equivalente": "1 tasse"
            },
            {
                "nom": "Parmesan râpé",
                "quantite": "100g",
                "quantite_equivalente": "1 tasse"
            },
            {
                "nom": "Œufs",
                "quantite": "2",
                "quantite_equivalente": "2 œufs"
            },
            {
                "nom": "Crème fraîche",
                "quantite": "100ml",
                "quantite_equivalente": "1/3 tasse"
            },
            {
                "nom": "Poivre noir",
                "quantite": "1 cuillère à café",
                "quantite_equivalente": "1 cuillère à café"
            }
        ],
        "etapes_de_preparation": [
            "Cuire les spaghettis selon les instructions sur l'emballage.",
            "Faire revenir les lardons dans une poêle jusqu'à ce qu'ils soient croustillants.",
            "Dans un bol, mélanger les œufs, la crème fraîche et le parmesan râpé.",
            "Égoutter les pâtes et les ajouter aux lardons dans la poêle.",
            "Hors du feu, ajouter le mélange d'œufs et de parmesan aux pâtes chaudes et bien mélanger.",
            "Assaisonner avec du poivre noir et servir immédiatement."
        ],
        "image_url": "https://images.pexels.com/photos/2703468/pexels-photo-2703468.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
    },
    {
        "id": 4,
        "titre": "Tacos au Bœuf",
        "temps_de_preparation": "30 minutes",
        "type_de_plat": 4,
        "type_de_cuisine": 4,
        "desc_courte": "Tortillas remplies de bœuf haché épicé, légumes et fromage.",
        "ingredients": [
            {
                "nom": "Bœuf haché",
                "quantite": "500g",
                "quantite_equivalente": "2 tasses"
            },
            {
                "nom": "Épices à tacos",
                "quantite": "30 ml",
                "quantite_equivalente": "2 cuillères à soupe"
            },
            {
                "nom": "Tortillas",
                "quantite": "8",
                "quantite_equivalente": "8 tortillas"
            },
            {
                "nom": "Laitue",
                "quantite": "1 tasse",
                "quantite_equivalente": "1 tasse"
            },
            {
                "nom": "Tomates",
                "quantite": "2",
                "quantite_equivalente": "1 tasse"
            },
            {
                "nom": "Fromage râpé",
                "quantite": "1 tasse",
                "quantite_equivalente": "1 tasse"
            }
        ],
        "etapes_de_preparation": [
            "Cuire le bœuf haché dans une poêle jusqu'à ce qu'il soit doré.",
            "Ajouter les épices à tacos et mélanger bien.",
            "Chauffer les tortillas selon les instructions sur l'emballage.",
            "Garnir les tortillas de bœuf haché, laitue, tomates et fromage râpé.",
            "Servir avec des sauces au choix."
        ],
        "image_url": "https://images.pexels.com/photos/461198/pexels-photo-461198.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
    }
];

document.addEventListener('DOMContentLoaded', () => {
    afficher_toutes_recettes(recettes);
});

function afficher_resume_recette(recette) {
    const mainElement = document.querySelector('main.principal2');
    const article = document.createElement('article');
    article.classList.add('recette');
    article.innerHTML = `
        <img class="lesImages" src="${recette.image_url}" alt="${recette.titre}">
        <h2>${recette.titre}</h2>
        <p>${recette.desc_courte}</p>
    `;
    article.addEventListener('click', () => {
        window.location.href = `./recette.html?id=${recette.id}`;
    });
    mainElement.appendChild(article);
}

function afficher_toutes_recettes(recettes) {
    const mainElement = document.querySelector('main.principal2');
    mainElement.innerHTML = ''; // Clear existing recipes
    recettes.forEach(recette => {
        afficher_resume_recette(recette);
    });
}
