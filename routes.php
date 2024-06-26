<?php
require_once __DIR__ . '/router.php';

// Routes statiques
get('/', 'index.php');
get('/recette', 'recette.php');
get('/login', 'login.php');
get('/nouveau_compte', 'nouveau_compte.php');

// API routes
get('/api/recettes', 'api/api_recettes');
get('/api/recettes/$id', 'api/api_recette_par_id');
get('/api/recettes/type_plat/$id', 'api/api_recettes_par_type_plat');
post('/api/recettes', 'api/api_creer_recette');

// Route 404
get('/404', '404.php');

?>
