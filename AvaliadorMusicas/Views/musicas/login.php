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
<div class="background-overlay"></div>
    
    <div class="login-container">
        
    <div class="border">
        <h1>Login</h1>
        <form method="POST" action="../index.php?action=validar">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>


        <button type="submit">Login</button>

        </form>
        <br>

        

        <a class="link"href="login?action=cadrastro">Não tem uma conta?</a>
    </div>
    

    
</body>
</html>
