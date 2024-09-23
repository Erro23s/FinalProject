<?php
require ('Views/musicas/create.php');
include("config.php");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error); 
} 

if ($_SERVER['REQUEST_URI'] === '/index.php') {
   header("Location: Views/musicas/index.php");
   exit(); 
}
?> 

<html>
    <body>
        <script>
           

        </script>
        
    </body>
</html>

