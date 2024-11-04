<?php
require_once __DIR__ . '../../controllers/CadastroController.php';
require_once __DIR__ . '../../controllers/MusicasController.php';
require_once __DIR__ . '../../controllers/LoginController.php';

$controller = new UserController();
$controllermusica = new MusicaController();
$validarcontroller = new ValidarController();

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'create') {
        $controller->createUser();
    } elseif ($_GET['action'] == 'validou') {
        $controllermusica->avaliarMusica();
        $listarmusica = $controllermusica->ListarMusicas();
        include __DIR__ . '../../Views/musicas/listarMusica.php';
    } elseif ($_GET['action'] == 'cadastro') {
        $controllermusica->CriarMusica();
    } elseif ($_GET['action'] == 'cadrastro') {
        include __DIR__ . '../../Views/musicas/cadastro.php';
    } elseif ($_GET['action'] == 'login') {
        include __DIR__ . '../../Views/musicas/login.php';
    } elseif ($_GET['action'] == 'validar') {
        $users = $validarcontroller->ValidarUsuario();
    } elseif ($_GET['action'] == 'admin') {
        $listarmusica = $controllermusica->ListarMusicas();
        $users = $controller->listarUsers();
        include __DIR__ . '../../Views/musicas/create.php';
    } elseif ($_GET['action'] == 'avaliar') {
        $controllermusica->avaliarMusica();
        header("Location: ../../index.php?action=validou");
        exit();
    } elseif ($_GET['action'] == 'pesquisar') {
        $pesquisar = $controllermusica->PesquisarMusica();
        $controllermusica->avaliarMusica();
        include __DIR__ . '../../Views/musicas/pesquisar.php';
    } elseif ($_GET['action'] == 'ordenarmaior') {
        $pesquisar = $controllermusica->PesquisarMusica();
        $controllermusica->avaliarMusica(); 
        $listarmusica = $controllermusica->ListarMusicasPorNota();
        include __DIR__ . '../../Views/musicas/listarmusica.php';
    } elseif ($_GET['action'] == 'ordenarmenor') {
        $pesquisar = $controllermusica->PesquisarMusica();
        $controllermusica->avaliarMusica();
        $listarmusica = $controllermusica->ListarMusicasPorNotaCrescente();
        include __DIR__ . '../../Views/musicas/listarmusica.php';
    } elseif ($_GET['action'] == 'perfil') {
        $userData = $validarcontroller->exibirUsers();
        include __DIR__ . '../../Views/musicas/show.php';
    }
       
    
} else {
    include __DIR__ . '../../Views/musicas/cadastro.php';
}