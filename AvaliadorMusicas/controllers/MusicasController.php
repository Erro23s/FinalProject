<?php
require_once __DIR__ . "../../Models/MusicaModel.php";
require_once __DIR__ . "../../core/Database.php";

class MusicaController {
    private $musicamodel;

    public function __construct() {
        $db = new Database();
        $this->musicamodel = new MusicaModel($db->getConnection());
    }

    public function CriarMusica() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $titulo = $_POST['titulo'];
            $artista = $_POST['artista'];
            $genero = $_POST['genero'];
            $url_musica = $_POST['url_musica'];
           
            
            

            if ($this->musicamodel->inserirMusica($titulo, $artista, $genero, $url_musica)) {
                header("location: ../index.php?action=admin");
        
            } else {
                echo "Erro ao inserir o usuário!";
            }
        }
    }

    public function ListarMusicas() {
        return $this->musicamodel->BuscarMusica();
    }

    public function PesquisarMusica(){
        
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $pesquisar = $_POST['pesquisar'];
                    return $this->musicamodel->PesquisarMusica($pesquisar); 
            }
        
    }
    
    
    public function avaliarMusica() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['musica_id'], $_POST['avaliacao'])) {
            $musicaId = (int) $_POST['musica_id'];
            $avaliacao = (int) $_POST['avaliacao'];
            $pesquisarTermo = isset($_POST['pesquisar']) ? $_POST['pesquisar'] : '';
    
            if ($avaliacao >= 1 && $avaliacao <= 5) {
                $this->musicamodel->adicionarAvaliacao($musicaId, $avaliacao);
                header("Location: ../../index.php?action=" . urlencode($pesquisarTermo));
                exit();
            }
        }
    }

    public function ListarMusicasPorNota() {
        return $this->musicamodel->BuscarMusicaOrdenadaPorNota();
    }

    public function ListarMusicasPorNotaCrescente() {
        return $this->musicamodel->BuscarMusicaOrdenadaPorNotaCrescente();
    }
  
    }
