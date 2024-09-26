<!DOCTYPE html>
<html lang="pt">
<head>
<link rel="stylesheet" type="text/css" href="../../public/Css/Cadastro.css" media="screen" />
    <meta charset="UTF-8">
    <title>Formulário de Usuário</title>
    <style>
    </style>
</head>
<body>
    <div class="background-overlay"></div> <!-- Fundo adicional atrás do formulário -->
    
    <div class="login-container">
        <div class="login-box">
    <div>
        <h1>Cadastrar</h1>
        <form method="POST" action="../index.php?action=create">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <button type="submit">Cadastrar</button>
        </form>
        <br> 

        <label for="a">Já tem conta?</label>
        <a href="login?action=login">Clique aqui</a>
    </div>
    

    
</body>
</html>