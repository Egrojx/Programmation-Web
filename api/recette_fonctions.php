<?php
require_once 'config.php';

function getRandomRecettes($limit = 7) {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM recettes ORDER BY RAND() LIMIT $limit");
    return $stmt->fetchAll();
}


function get_recette_id($id) {
    global $pdo;

    
    $stmt = $pdo->prepare("SELECT * FROM recettes WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $recette = $stmt->fetch(PDO::FETCH_ASSOC);

    
    $stmt = $pdo->prepare("SELECT nom, quantite, quantite_equivalente FROM ingredients WHERE recette_id = :id");
    $stmt->execute(['id' => $id]);
    $ingredients = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    $stmt = $pdo->prepare("SELECT etape FROM etapes_de_preparation WHERE recette_id = :id ORDER BY etape_numero ASC");
    $stmt->execute(['id' => $id]);
    $etapes_de_preparation = $stmt->fetchAll(PDO::FETCH_COLUMN);

   
    $stmt = $pdo->prepare("SELECT nom FROM types_plats WHERE id = :id");
    $stmt->execute(['id' => $recette['type_de_plat']]);
    $type_de_plat = $stmt->fetchColumn();

    
    $stmt = $pdo->prepare("SELECT nom FROM types_cuisines WHERE id = :id");
    $stmt->execute(['id' => $recette['type_de_cuisine']]);
    $type_de_cuisine = $stmt->fetchColumn();

    
    $recette['ingredients'] = $ingredients;
    $recette['etapes_de_preparation'] = $etapes_de_preparation;
    $recette['type_de_plat'] = $type_de_plat;
    $recette['type_de_cuisine'] = $type_de_cuisine;

    echo json_encode($recette);
}


function get_recettes_type_plat($id) {
    global $pdo;

    if ($id == 0) {
        
        $stmt = $pdo->prepare("SELECT * FROM recettes ORDER BY RAND() LIMIT 7");
    } else {
        
        $stmt = $pdo->prepare("SELECT * FROM recettes WHERE type_de_plat = :id");
        $stmt->execute(['id' => $id]);
    }
    
    $stmt->execute();
    $recettes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($recettes);
}



function create_recette() {
    global $pdo;

    
    $data = json_decode(file_get_contents('php://input'), true);

    
    $titre = $data['titre'] ?? null;
    $temps_de_preparation = $data['temps_de_preparation'] ?? null;
    $type_de_plat = $data['type_de_plat'] ?? null;
    $type_de_cuisine = $data['type_de_cuisine'] ?? null;
    $desc_courte = $data['desc_courte'] ?? null;
    $image_url = $data['image_url'] ?? null;
    $ingredients = $data['ingredients'] ?? [];
    $etapes_de_preparation = $data['etapes_de_preparation'] ?? [];

    
    $stmt = $pdo->query("SELECT MAX(id) AS max_id FROM recettes");
    $max_id = $stmt->fetch(PDO::FETCH_ASSOC)['max_id'];
    $new_id = $max_id + 1;

    
    $stmt = $pdo->prepare("INSERT INTO recettes (id, titre, temps_de_preparation, type_de_plat, type_de_cuisine, desc_courte, image_url) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$new_id, $titre, $temps_de_preparation, $type_de_plat, $type_de_cuisine, $desc_courte, $image_url]);

    
    $stmt = $pdo->prepare("INSERT INTO ingredients (recette_id, nom, quantite, quantite_equivalente) VALUES (?, ?, ?, ?)");
    foreach ($ingredients as $ingredient) {
        $stmt->execute([$new_id, $ingredient['nom'], $ingredient['quantite'], $ingredient['quantite_equivalente']]);
    }

    
    $stmt = $pdo->prepare("INSERT INTO etapes_de_preparation (recette_id, etape, etape_numero) VALUES (?, ?, ?)");
    foreach ($etapes_de_preparation as $index => $etape) {
        $stmt->execute([$new_id, $etape, $index + 1]);
    }

    echo json_encode(['success' => 'Recette créé']);
}


function update_recette($id) {
    global $pdo;


    $data = json_decode(file_get_contents('php://input'), true);

   
    $titre = $data['titre'] ?? null;
    $temps_de_preparation = $data['temps_de_preparation'] ?? null;
    $type_de_plat = $data['type_de_plat'] ?? null;
    $type_de_cuisine = $data['type_de_cuisine'] ?? null;
    $desc_courte = $data['desc_courte'] ?? null;
    $image_url = $data['image_url'] ?? null;
    $ingredients = $data['ingredients'] ?? [];
    $etapes_de_preparation = $data['etapes_de_preparation'] ?? [];

    
    $stmt = $pdo->prepare("UPDATE recettes SET titre = ?, temps_de_preparation = ?, type_de_plat = ?, type_de_cuisine = ?, desc_courte = ?, image_url = ? WHERE id = ?");
    $stmt->execute([$titre, $temps_de_preparation, $type_de_plat, $type_de_cuisine, $desc_courte, $image_url, $id]);

    
    $stmt = $pdo->prepare("DELETE FROM ingredients WHERE recette_id = ?");
    $stmt->execute([$id]);

    
    $stmt = $pdo->prepare("INSERT INTO ingredients (recette_id, nom, quantite, quantite_equivalente) VALUES (?, ?, ?, ?)");
    foreach ($ingredients as $ingredient) {
        $stmt->execute([$id, $ingredient['nom'], $ingredient['quantite'], $ingredient['quantite_equivalente']]);
    }

    
    $stmt = $pdo->prepare("DELETE FROM etapes_de_preparation WHERE recette_id = ?");
    $stmt->execute([$id]);

    
    $stmt = $pdo->prepare("INSERT INTO etapes_de_preparation (recette_id, etape, etape_numero) VALUES (?, ?, ?)");
    foreach ($etapes_de_preparation as $index => $etape) {
        $stmt->execute([$id, $etape, $index + 1]);
    }

    echo json_encode(['success' => 'recette mise à jour']);
}

?>