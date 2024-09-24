<?php
class MusicaModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function inserirMusica($titulo, $artista, $genero, $url_musica) {
        $query = "INSERT INTO musicas (titulo, artista, genero, url_musica) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            
            die('Erro na preparação da query: ' . $this->conn->error);
        }
        $stmt->bind_param("ssss", $titulo, $artista, $genero, $url_musica);
        return $stmt->execute();
    }

    public function BuscarMusica() {
        $query = "SELECT * FROM musicas";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
