<?php
require_once __DIR__ . "../../Models/CadastroModel.php";
require_once __DIR__ . "../../core/Database.php";

class UserController {
    private $userModel;

    public function __construct() {
        $db = new Database();
        $this->userModel = new UserModel($db->getConnection());
    }

    public function createUser() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];

            if ($this->userModel->inserirUser($name, $email)) {
                header("location: ../index.php?action=login");
        
            } else {
                echo "Erro ao inserir o usuário!";
            }
        }
    }

    public function listUsers() {
        return $this->userModel->buscarUsers();
    }

    public function EditarUsuarioControll() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];

            if ($this->userModel->EditarUsuarioModel($id, $name, $email)) {
                echo "Usuário atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar o usuário!";
            }
        }
}}
