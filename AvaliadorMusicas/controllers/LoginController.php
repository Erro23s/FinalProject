<?php
require_once __DIR__ . "../../Models/LoginModel.php";
require_once __DIR__ . "../../core/Database.php";

class ValidarController {
    private $userModel;

    public function __construct() {
        $db = new Database();
        $this->userModel = new UserModel($db->getConnection());
    }
    public function ValidarUsuario() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        return $this->userModel->buscarUsers($name,$email);
        if ($result->num_rows > 0) {
           header("location: ../index.php?action=validou");
        } else {
            echo "Email ou senha incorretos.";
        }
    }
}
