
<?php

require("config.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['Titulo'];
    $author = $_POST['autor_id'];
    $genre = $_POST['genero_id'];
    $date = $_POST['data1'];
    
    
    $stmt = $conn->prepare("INSERT INTO users (name, email, Genero, data) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $titulo, $author, $genre, $date);

    if ($stmt->execute()) {
        header('Location: registrarcopia.php');
        
    } else {
        echo "Erro: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>