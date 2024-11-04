<?php
session_start(); 
require_once __DIR__ . "../../Models/LoginModel.php";
require_once __DIR__ . "../../core/Database.php";

class ValidarController {
    private $ValidarModel;

    public function __construct() {
        $db = new Database();
        $this->ValidarModel = new ValidarModel($db->getConnection());
    }
    public function ValidarUsuario() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            

            if ($this->ValidarModel->buscarUsuario($name,$email)) {
                header("location: ../index.php?action=validou");
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
            } else {
                echo "Erro ao inserir o usuário no sistema";
            }
        }
    } public function exibirUsers() {
        if (isset($_SESSION['name']) && isset($_SESSION['email'])) {
            $name = $_SESSION['name'];
            $email = $_SESSION['email'];
            return $this->ValidarModel->buscarUsuario2($name, $email);
            }
}}
