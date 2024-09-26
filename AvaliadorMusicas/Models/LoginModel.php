<?php
class ValidarModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }
    public function buscarUsers($name, $email) {
        $query = "SELECT * FROM users WHERE name = '$name', email = '$email'";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
