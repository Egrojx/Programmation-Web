<?php

require_once 'config.php';
require_once 'router.php';
require_once 'api/recette_fonctions.php';

get('/', function() {
    include 'index.php';
});

get('/recette', function() {
    include 'recette.php';
});

get('/login', function() {
    include 'login.php';
});

get('/nouveau_compte', function() {
    include 'nouveau_compte.php';
});


get('/api/recettes', function() {
    header('Content-Type: application/json');
    echo json_encode(getRandomRecettes());
});

get('/api/recettes/$id', function($id) {
    header('Content-Type: application/json');
    get_recette_id($id);
});


get('/api/recettes/type_plat/$id', function($id) {
    header('Content-Type: application/json');
    get_recettes_type_plat($id);
});

post('/api/recettes', function() {
    header('Content-Type: application/json');
    create_recette();
});

put('/api/recettes/$id', function($id) {
    header('Content-Type: application/json');
    update_recette($id);
});

?>
