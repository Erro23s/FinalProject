<?php
require_once __DIR__ . '../../controllers/UserController.php';
require_once __DIR__ . '../../controllers/MusicasController.php';
$controller = new UserController();
$controllermusica = new MusicaController();


if (isset($_GET['action'])) {
    if ($_GET['action'] == 'create') {
        $controller->createUser();

    } elseif ($_GET['action'] == 'list') {
        $users = $controller->listUsers();
        include __DIR__ . '../../Views/musicas/create.php';
    }
      elseif ($_GET['action'] == 'cadastro'){
        $controllermusica->CriarMusica();

    } elseif($_GET['action'] == 'listarmusicas') {
        
        $listarmusica=$controllermusica->ListarMusicas();
        include __DIR__ . '../../Views/musicas/listarMusica.php';

    }elseif($_GET['action'] == 'cadrastro') {
        include __DIR__ .  '../../Views/musicas/cadastro.php';
    }elseif($_GET['action'] == 'login') {
         include __DIR__ . '../../Views/musicas/login.php';

    }
} else {
    include __DIR__ . '../../Views/musicas/cadastro.php';
}